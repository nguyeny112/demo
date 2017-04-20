<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\User;
use App\Http\Requests\UserFormRequest;
use Session;

class AuthController extends Controller
{
	public function getRegister(){
        if(Auth::user()){
            return redirect()->route('public.index.index');
        }
		return view('auth.register');
	}
    public function postRegister(UserFormRequest $request){
        if($request->avatar){
        $ext = $request->file('avatar')->getClientOriginalExtension();
        $avatar_name = str_slug($request->name).'_'.time().'.'.$ext;
        $avatar = $request->file('avatar')->storeAs('public/useravatar/',$avatar_name);
        }else{
            $avatar_name = 'default.jpg';
        }
        $password = bcrypt(trim($request->password));
        $newUser = array(
            'username' => $request->username,
            'name' => $request->name,
            'phone' => $request->phone,
            'address'=>$request->address,
            'email'=>$request->email,
            'level'=>3,
            'avatar'=>$avatar_name,
            'password'=>$password
        );
        if(User::create($newUser)){
            $request->session()->flash('popupmsg','Welcome '.$request->username.'! Your account\' created successfully, please check your email: '.$request->email.' for vertification');
            Auth::attempt(['username'=>$request->username,'password'=>$request->password]);
            return redirect()->route('public.index.index');
        }else{
            $request->session()->flash('popupmsg','There were an error, please try again!');
            return redirect()->route('public.index.index');
        }
    }
    public function getLogin(){
        if(Auth::user()) return redirect()->intended('/');
    	return view('auth.login');
    }
    public function postLogin(Request $request){
        if($request->guest){
            Session::put('Guest','Guest');
            return redirect()->route('public.order.step1');
        };
        $username = trim($request->username);
        $password = trim($request->password);

        if(Auth::attempt(['username'=>$username,'password'=>$password]) OR Auth::attempt(['email'=> $request->username, 'password' => $request->password])){
            return redirect()->intended('/');
        }else{
            $request->session()->flash('errormsg','Incorrect Username/Email or Password');
            return redirect()->route('global.auth.login');
        }
    }
    public function logout(){
    	Auth::logout();
    	return redirect()->route('public.index.index');
    }
}
