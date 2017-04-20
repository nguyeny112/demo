<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;
use App\Http\Requests\BrandFormRequest;

class PaymentController extends Controller
{
    public function __construct(){
        $this->middleware('adminlevelonly');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = Payment::orderBy('id','ASC')->paginate(getenv('ROW_COUNT'));
        return view('admin.payment.index',['payment'=>$payment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment.create');
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
            'payment_name' => $request->name,
            'payment_info' => $request->desc
        );
        if(Payment::insert($newBrand)){
            $request->session()->flash('msg','Payment: '.$request->name.' is created');
            return redirect()->route('admin.payment.index');
        }else{
            $request->session()->flash('msg','There were an error, please try again!');
            return redirect()->route('admin.payment.index');
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
        $payment = Payment::findOrfail($id);
        return view('admin.payment.edit',['payment'=>$payment]);
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
        $paymentItem = Payment::findOrfail($id);
        $paymentItem->payment_name = $request->name;
        $paymentItem->payment_info = $request->desc;
        if($paymentItem->update()){
            $request->session()->flash('msg','Edit Payment Successfully');
            return redirect()->route('admin.payment.index');
        }else{
            $request->session()->flash('msg','Edit Payment Unsucessfully');
            return redirect()->route('admin.payment.index');
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
        $delCat = Payment::findOrfail($id);
        if($delCat->delete()){
            $request->session()->flash('msg','Delete Payment Successfully');
            return redirect()->route('admin.payment.index');
        }else{
            $request->session()->flash('msg','Delete Payment Unsuccessfully');
            return redirect()->route('admin.payment.index');
        }
    }
}
