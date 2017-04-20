<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('adminlevelonly',['only'=>['destroy','create','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id','ASC')->paginate(getenv('ROW_COUNT'));
        return view('admin.user.index',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
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
            'level'=>$request->level,
            'avatar'=>$avatar_name,
            'password'=>$password
            );
        if(User::create($newUser)){
            $request->session()->flash('msg','User: '.$request->username.' is created');
            return redirect()->route('admin.user.index');
        }else{
            $request->session()->flash('msg','There were an error, please try again!');
            return redirect()->route('admin.user.index');
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
        return redirect()->route('admin.user.edit',['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);
        if (Gate::allows('edit-self', $user)) {
            return view('admin.user.edit',['user'=>$user]);
        }else{
            return view('admin.user.edit',['user'=>Auth::user()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {
        $userItem = User::findOrfail($id);
        if (Gate::allows('edit-self', $userItem)) {
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
            if (Gate::allows('change-level', $userItem)) {
                $userItem->level = $request->level;
            }else if($userItem->level!=$request->level){
                $request->session()->flash('errormsg','Cant change this User Level');
                return redirect()->route('admin.user.index');
            }
            $userItem->address = $request->address;
            if($request->password!=''){
                $userItem->password = $request->password;
            }
            if($userItem->update()){
                $request->session()->flash('msg','Edit User Successfully');
                return redirect()->route('admin.user.index');
            }else{
                $request->session()->flash('msg','Edit User Unsucessfully');
                return redirect()->route('admin.user.index');
            }
        }else{
            return abort(404);
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
        $delUser = User::findOrfail($id);
        if(Gate::allows('del-self',$delUser)){
            if($delUser->delete()){
                $request->session()->flash('msg','Delete User Successfully');
                return redirect()->route('admin.user.index');
            }else{
                $request->session()->flash('msg','Delete User Unsuccessfully');
                return redirect()->route('admin.user.index');
            }
        }else{
            $request->session()->flash('errormsg','You cant delete your own account');
            return redirect()->route('admin.user.index');
        }
    }
}
