<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;  
use App\Http\Requests\BrandFormRequest;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('adminlevelonly',['except'=>'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::orderBy('id','ASC')->paginate(getenv('ROW_COUNT'));
        return view('admin.brand.index',['brand'=>$brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
            'brand_name' => $request->name,
            'brand_desc' => $request->desc
        );
        if(Brand::insert($newBrand)){
            $request->session()->flash('msg','Brand: '.$request->name.' is created');
            return redirect()->route('admin.brand.index');
        }else{
            $request->session()->flash('msg','There were an error, please try again!');
            return redirect()->route('admin.brand.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrfail($id);
        return view('admin.brand.edit',['brand'=>$brand]);
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
        $brandItem = Brand::findOrfail($id);
        $brandItem->brand_name = $request->name;
        $brandItem->brand_desc = $request->desc;
        if($brandItem->update()){
            $request->session()->flash('msg','Edit Brand Successfully');
            return redirect()->route('admin.brand.index');
        }else{
            $request->session()->flash('msg','Edit Brand Unsucessfully');
            return redirect()->route('admin.brand.index');
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
        $delBrand = Brand::findOrfail($id);
        if($delBrand->delete()){
            $request->session()->flash('msg','Delete Brand Successfully');
            return redirect()->route('admin.brand.index');
        }else{
            $request->session()->flash('msg','Delete Brand Unsuccessfully');
            return redirect()->route('admin.brand.index');
        }
    }
}
