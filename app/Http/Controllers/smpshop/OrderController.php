<?php

namespace App\Http\Controllers\smpshop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Order;
use Session;
use Auth;
use Cart;
use App\Order_Detail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('userMiddleware',['only'=>['index','getStep1']]);
    }

    public function index()
    {
        return redirect()->route('public.order.step1');
    }
    public function getStep1(Request $request){
        if(Cart::count()==0){
            $request->session()->flash('popupmsg','You dont have any item in your cart');
            return redirect()->route('public.index.index');
        }
        return view('public.order.step1');
    }
    public function postStep1(OrderRequest $request){
       Session::put('request',$request->toArray());
       return redirect()->route('public.order.step2');
   }
   public function getStep2(Request $request){
    if(!Session::has('request')){
        return redirect()->route('public.index.index');
    }else{
        $request = (object)Session::get('request');
    }
    return view('public.order.step2',['request'=>$request]);
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       return redirect()->route('public.order.step1');
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = (object)Session::get('request');
        if(Auth::user()){
            $username = Auth::user()->username;
        }else{
            $username = 'Guest';
            Session::forget('Guest');
        }
        // dd(Cart::total());
        $newOrder = array(
            'payment_id'=>$request->payment,
            'username'=>$username,
            'userphone'=>$request->phone,
            'fullname'=>$request->name,
            'useremail'=>$request->email,
            'useraddress'=>$request->address,
            'moreinfo'=>$request->detail,
            'amount'=>intval(str_replace(',', '', Cart::subtotal())),
            'status'=>0
            );
        $order = Order::create($newOrder);
        if($order){
            Session::flash('popupmsg','Your Order is sent, we will contact with you later, check your order status in Profile or in your Email');
            Session::forget('request');
            foreach(Cart::content() as $item){
                $newOrderDetail = array(
                    'order_id'=>$order->id,
                    'product_id'=>$item->id,
                    'quantity'=>$item->qty
                );
                Order_Detail::create($newOrderDetail);
            };
            Cart::destroy();
            return redirect()->route('public.index.index');
        }else{
            $request->session()->flash('errormsg','Your order is not successfully sent, please try again');
            return redirect('public.index,index');
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
        return redirect()->route('public.order.step1');
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
        //
    }
}
