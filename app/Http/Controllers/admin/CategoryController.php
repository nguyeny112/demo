<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\BrandFormRequest;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('adminlevelonly',['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('id','ASC')->paginate(getenv('ROW_COUNT'));
        return view('admin.category.index',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandFormRequest $request)
    {
        $newBrand = array(
            'cat_name' => $request->name,
            'cat_desc' => $request->desc
        );
        if(Category::insert($newBrand)){
            $request->session()->flash('msg','Category: '.$request->name.' is created');
            return redirect()->route('admin.category.index');
        }else{
            $request->session()->flash('msg','There were an error, please try again!');
            return redirect()->route('admin.category.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Category::findOrfail($id);
        $productList = $cat->product()->paginate(10);
        return view('admin.category.show',['product'=>$productList,'cat'=>$cat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrfail($id);
        return view('admin.category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandFormRequest $request, $id)
    {
        $categoryItem = Category::findOrfail($id);
        $categoryItem->cat_name = $request->name;
        $categoryItem->cat_desc = $request->desc;
        if($categoryItem->update()){
            $request->session()->flash('msg','Edit Category Successfully');
            return redirect()->route('admin.category.index');
        }else{
            $request->session()->flash('msg','Edit Category Unsucessfully');
            return redirect()->route('admin.category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $delCat = Category::findOrfail($id);
        if($delCat->delete()){
            $request->session()->flash('msg','Delete Category Successfully');
            return redirect()->route('admin.category.index');
        }else{
            $request->session()->flash('msg','Delete Category Unsuccessfully');
            return redirect()->route('admin.category.index');
        }
    }
}
