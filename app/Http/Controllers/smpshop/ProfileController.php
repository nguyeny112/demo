<?php

namespace App\Http\Controllers\smpshop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Http\Requests\ProfileRequest;
use App\Order;

class ProfileController extends Controller
{
	public function __construct(){
		$this->middleware('auth',['except'=>'show']);
	}

	public function getProfile(){
		$user = Auth::user();
		$order = Order::where('username',$user->username)->orderBy('id','DESC')->get();
		return view('public.profile.index',['user'=>$user,'order'=>$order]);
	}
	public function postProfile(ProfileRequest $request){
		$user = Auth::user();
		$userItem = User::findOrfail($user->id);
		$userItem->name = $request->name;
		$userItem->email = $request->email;
		$userItem->phone = $request->phone;
		if($request->avatar){
			$ext = $request->avatar->getClientOriginalExtension();
			$avatar_name = str_slug($request->name).'_'.time().'.'.$ext;
			$avatar = $request->file('avatar')->storeAs('public/useravatar/',$avatar_name);
			if($userItem->avatar!='default.jpg'){
				Storage::delete('public/useravatar/'.$userItem->avatar);
			}
			$userItem->avatar = $avatar_name;
		}
		$userItem->address = $request->address;
		if($request->password!=''){
			$userItem->password = $request->password;
		}
		if($userItem->update()){
			$request->session()->flash('popupmsg','Edit your profile Successfully');
			return redirect()->route('public.profile.index');
		}else{
			$request->session()->flash('popupmsg','Edit profile Unsucessfully');
			return redirect()->route('public.profile.index');
		}
	}
	public function show($id,Request $request){
		// return 'ádasdasd';
		$order = Order::findOrfail($id);
		if(Auth::user()){
			if(Auth::user()->username==$order->username){
				return view('public.order.show',['order'=>$order]);
			}
		}else if($request->email==$order->useremail){
			return view('public.order.show',['order'=>$order]);
		}
		$request->session()->flash('popupmsg','You dont have permission to access this order');
		return redirect()->route('public.index.index');
	}
}
