<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advertisement;
use App\Http\Requests\AdvertisementRequest;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisement = Advertisement::orderBy('id','ASC')->paginate(getenv('ROW_COUNT'));
        return view('admin.advertisement.index',['advertisement'=>$advertisement]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisementRequest $request)
    {
        $ext = $request->file('picture')->getClientOriginalExtension();
        $picname = 'VNE_'.time().'.'.$ext;
        $pic = $request->file('picture')->storeAs('public/advert/',$picname);
        $newAdvertisement = array(
            'ads_title' => $request->title,
            'ads_link' => $request->link,
            'ads_desc' => $request->desc,
            'ads_image' => 'advert/'.$picname
        );
        if(Advertisement::insert($newAdvertisement)){
            $request->session()->flash('msg','Advertisement: '.$request->title.' is created');
            return redirect()->route('admin.advertisement.index');
        }else{
            $request->session()->flash('msg','There were an error, please try again!');
            return redirect()->route('admin.advertisement.index');
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
        $advertisement = Advertisement::findOrfail($id);
        return view('admin.advertisement.edit',['advertisement'=>$advertisement]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisementRequest $request, $id)
    {
        // dd('?');
        $advertisementItem = Advertisement::findOrfail($id);
        $advertisementItem->ads_title = $request->title;
        $advertisementItem->ads_desc = $request->desc;
        $advertisementItem->ads_link = $request->link;

        if($request->picture!=''){
             $ext = $request->file('picture')->getClientOriginalExtension();
            $picname = 'VNE_'.time().'.'.$ext;
            $pic = $request->file('picture')->storeAs('public/advert/',$picname);
            if($advertisementItem->ads_image!=''){
                Storage::delete('public/'.$advertisementItem->ads_image);
            }
            $advertisementItem->ads_image = 'advert/'.$picname;
        }
        
        if($advertisementItem->update()){
            $request->session()->flash('msg','Edit Advertisement Successfully');
            return redirect()->route('admin.advertisement.index');
        }else{
            $request->session()->flash('msg','Edit Advertisement Unsucessfully');
            return redirect()->route('admin.advertisement.index');
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
        $delAdvertisement = Advertisement::findOrfail($id);
        if($delAdvertisement->delete()){
            if($delAdvertisement->ads_image!=''){
                Storage::delete('public/'.$delAdvertisement->ads_image);
            }
            $request->session()->flash('msg','Delete Advertisement Successfully');
            return redirect()->route('admin.advertisement.index');
        }else{
            $request->session()->flash('msg','Delete Advertisement Unsuccessfully');
            return redirect()->route('admin.advertisement.index');
        }
    }
}
