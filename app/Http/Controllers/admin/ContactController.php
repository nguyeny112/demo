<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Mail;
use App\Mail\ReplyContact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::orderBy('id','ASC')->paginate(getenv('ROW_COUNT'));
        return view('admin.contact.index',['contact'=>$contact]);
    }
    public function reply(Request $request){
        $to = $request->email;
        $name = $request->name;
        $detail = $request->content;
        $title = $request->title;
        $id = $request->replyid;
        // dd($request);
        $contact = Contact::find($id);
        if($contact->status == 0){
            $contact->status = 1;
            $contact->update();
        };
        // dd($request);
        $result = Mail::to($to)->send(new ReplyContact($name,$detail,$title));
        $request->session()->flash('msg','Your reply has successfully sent');
        return redirect()->route('admin.contact.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id,Request $request)
    {
        $delContact = Contact::findOrfail($id);
        if($delContact->delete()){
            $request->session()->flash('msg','Delete Contact Successfully');
            return redirect()->route('admin.contact.index');
        }else{
            $request->session()->flash('msg','Delete Contact Unsuccessfully');
            return redirect()->route('admin.contact.index');
        }
    }
}
