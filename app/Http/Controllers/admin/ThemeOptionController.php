<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FeaturedSlider;
use App\Http\Requests\FeaturedSliderRequest;
use Illuminate\Support\Facades\Storage;

class ThemeOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('adminlevelonly');
    }
    public function index()
    {
        $slide = FeaturedSlider::orderBy('id','DESC')->paginate(getenv('ROW_COUNT'));
        return view('admin.themeoption.index',['slide'=>$slide]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUpdate(Request $request, FeaturedSlider $featuredslider)
    {
        return redirect()->route('admin.index.index');
    }    
    public function postUpdate($id,FeaturedSliderRequest $request)
    {
        $item = FeaturedSlider::findOrfail($id);
        if($request->image){
        $ext = $request->image->getClientOriginalExtension();
        $picname = 'VNE_'.time().'.'.$ext;
        $pic = $request->image->storeAs('public/slide/',$picname);
         if($item->image_path!=''){
                Storage::delete('public/'.$item->image_path);
        };
        $item->image_path = 'slide/'.$picname;  
        }
        $item->title = $request->title;
        $item->desc = $request->desc;
        $item->buttontext = $request->buttontext;
        $item->link = $request->link;
        if($item->update()){
            return $item;
        }else{
            return false;
        }
    }
    public function create()
    {
         $slide = FeaturedSlider::orderBy('id','ASC')->get();
        return view('admin.themeoption.index',['slide'=>$slide]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeaturedSliderRequest $request)
    {
        // dd($request);
        // $validation = $this->validate($request, [
        //     'title' => 'required|max:255',
        // ]);
        // if ($validation->fails())
        // {
        //        return 'asdasd';
        //  }
        $ext = $request->image->getClientOriginalExtension();
        $picname = 'VNE_'.time().'.'.$ext;
        $pic = $request->image->storeAs('public/slide/',$picname);
        $newSlider = array(
            'title'=>$request->title,
            'desc'=>$request->desc,
            'link'=>$request->link,
            'buttontext'=>$request->buttontext,
            'image_path'=>'slide/'.$picname,
        );
        // dd($newSlider);
        $slider = FeaturedSlider::create($newSlider);
        if($slider){
            return $slider;
        }else{
            return false;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delSlider = FeaturedSlider::findOrfail($id);
        if($delSlider->image_path!=''){
                Storage::delete('public/'.$delSlider->image_path);
            };
        $delSlider->delete();
        return 'pass';
    }
}
