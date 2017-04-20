<?php

namespace App\Http\Controllers\smpshop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FeaturedSlider;
use App\Product;
use App\Contact;
use App\Http\Requests\ContactFormRequest;

class IndexController extends Controller
{
    public function index(){
        $theme = FeaturedSlider::all();
        $products = Product::all();
        // dd($theme);
    	return view('public.index.index',['theme'=>$theme,'products'=>$products]);
    }
    public function getContact(){
    	return view('public.index.contact');
    }
    public function postContact(ContactFormRequest $request){
        $newContact = array(
            'contact_name'=>$request->name,
            'contact_email'=>$request->email,
            'contact_title'=>$request->title,
            'contact_detail'=>$request->detail,
            'contact_phone'=>$request->phone
        );
        if(Contact::insert($newContact)){
            $request->session()->flash('popupmsg','Your contact is sent, we will reply ASAP');
            return redirect()->route('public.index.index');
        }else{
            $request->session()->flash('popupmsg','Please try again');
            return redirect()->route('public.index.contact');
        }
    }
     public function about(){
    	return view('public.index.about');
    }
    public function search(Request $request){
        // dd($request->q);
        $str = trim($request->q);
        if($str==''){
            $request->session()->flash('popupmsg','Please enter some keywords');
            return redirect()->route('public.index.index');
        }
        $products = Product::where('pname','LIKE','%'.$str.'%')->orWhere('tags','LIKE','%'.$str.'%')->orderBy('view','DESC')->paginate(12);
        $products->withPath('/search.html?q='.$str);
    	return view('public.index.search',['products'=>$products,'keyword'=>$str]);
    }
    public function getTag($slug,Request $request){
        $products = Product::where('tags','LIKE','%'.$slug.',%')->orWhere('tags','LIKE','%,'.$slug.'%')->orderBy('view','DESC')->paginate(12);
        return view('public.index.tag',['products'=>$products,'keyword'=>$slug]);
    }
}
