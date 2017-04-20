<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Category;
use App\ImageList;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('id','ASC')->get();
        return view('admin.product.index',['product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cat = Category::find($request->cat);
        if($cat){
            return view('admin.product.create',['cat'=>$cat]);
        };
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // dd($request);
        $ext = $request->file('picture')->getClientOriginalExtension();
        $picname = str_slug($request->name).'_'.time().'.'.$ext;
        $cat = Category::find($request->category);
        $catName = $cat->cat_name;
        $pic = $request->file('picture')->storeAs('public/product/'.str_slug($catName).'/',$picname);
        $newProduct = array(
            'pname' => $request->name,
            'preview' => $request->desc,
            'detail' => $request->detail,
            'spec' => $request->spec,
            'brand_id'=>$request->brand,
            'cat_id'=>$request->category,
            'price'=>$request->price,
            'discount'=>($request->discount)/100,
            'tags'=>$request->tags,
            'image' => 'product/'.str_slug($catName).'/'.$picname
            );
        $product = Product::create($newProduct);
        if($product){
            $request->session()->flash('msg','Product: '.$request->name.' is created');
        }else{
            $request->session()->flash('msg','There were an error, please try again!');
            return redirect()->route('admin.product.index');
        }
        // dd($product);
        if($request->pictureList){
            $pictureList = $request->pictureList;
            $i = 1;
            foreach($pictureList as $item){
                $itemExt = $item->getClientOriginalExtension();
                $itemName = str_slug($request->name).'_'.time().'_'.$i.'.'.$itemExt;
                $item->storeAs('public/product/'.str_slug($catName).'/',$itemName);
                $newItem = array(
                    'product_id'=>$product->id,
                    'picture'=>'product/'.str_slug($catName).'/'.$itemName
                    );
                $item = ImageList::create($newItem);
                $i++;
                if(!$item){
                   $request->session()->flash('warnmsg','Cant insert ImageList: '.$item->getClientOriginalName().' please edit with another picture');
                   return redirect()->route('admin.product.index');
               }
           }
       }
       return redirect()->route('admin.category.show',['id'=>$product->cat_id]);
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
        $product = Product::findOrfail($id);
        return view('admin.product.edit',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $productItem = Product::findOrfail($id);
        $productItem->pname = $request->name;
        $productItem->preview = $request->desc;
        $productItem->detail = $request->detail;
        $productItem->spec = $request->spec;
        $productItem->brand_id= $request->brand;
        $productItem->cat_id= $request->category;
        $productItem->price= $request->price;
        $productItem->discount= ($request->discount)/100;
        $productItem->tags= $request->tags;
        $cat = Category::find($request->category);
        $catName = $cat->cat_name;
        if($request->picture!=null){
            $ext = $request->file('picture')->getClientOriginalExtension();
            $picname = str_slug($request->name).'_'.time().'.'.$ext;
            $pic = $request->file('picture')->storeAs('public/product/'.str_slug($catName).'/',$picname);
            if($productItem->image!=''){
                Storage::delete('public/'.$productItem->image);
            }
            $productItem->image = 'product/'.str_slug($catName).'/'.$picname;
        }
        if($productItem->update()){
            $request->session()->flash('msg','Edit Product Successfully');
        }else{
            $request->session()->flash('msg','Edit Product Unsucessfully');
            return redirect()->route('admin.product.index');
        }
        if($request->pictureList){
            $imageList = ImageList::where('product_id',$id)->get();
            if($imageList->count()>0){
                foreach($imageList as $image){
                    Storage::delete('public/'.$image->picture);
                }
                $image->delete();
            }
            $pictureList = $request->pictureList;
            $i = 1;
            foreach($pictureList as $item){
                $itemExt = $item->getClientOriginalExtension();
                $itemName = str_slug($request->name).'_'.time().'_'.$i.'.'.$itemExt;
                $item->storeAs('public/product/'.str_slug($catName).'/',$itemName);
                $newItem = array(
                    'product_id'=>$productItem->id,
                    'picture'=>'product/'.str_slug($catName).'/'.$itemName
                    );
                $item = ImageList::create($newItem);
                $i++;
                if(!$item){
                   $request->session()->flash('warnmsg','Cant insert ImageList: '.$item->getClientOriginalName().' please edit with another picture');
                   return redirect()->route('admin.product.index');
               }
           }
       }
       return redirect()->route('admin.category.show',['id'=>$productItem->cat_id]);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        // dd(ImageList::where('product_id',1231232)->get()->count());
        $delProduct = Product::findOrfail($id);
        if($delProduct->delete()){
            $delProduct->deleteImage($delProduct);
            $request->session()->flash('msg','Delete Product Successfully');
            return redirect()->route('admin.product.index');
        }else{
            $request->session()->flash('msg','Delete Product Unsuccessfully');
            return redirect()->route('admin.product.index');
        }
    }
}
