<?php

namespace App\Http\Controllers\smpshop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.order.cart');
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
        // Cart::destroy();
        $id = $request->id;
        $qty = $request->qty;
        $result = array(
            'new' => false,
            'message' => '',
            'qty' => ''
        );
        // return $result;
        foreach(Cart::content() as $item){
            if($item->id==$id){
                $result['message'] = '<div class="alert alert-danger">You already have this item in your cart</div>';
                return $result;
            }
        }
        // return $result;
        // <div class="alert alert-success ajaxcartmessage"  style="display:none"></div>
        // return Cart::content()->toArray();
        $product = Product::findOrfail($id);
        $cartItem = Cart::add($product->id,$product->pname,$qty,$product->price*(100-$product->discount)/100)->associate('App\Product');
        // $cartitem->associate('App/Product');
        // $item = Cart::content();
        // return $qty;
        $result['new'] = true;
        $result['qty'] = Cart::count();
        $result['message'] = '<div class="alert alert-success">'.$qty.' '.$product->pname .' is added into your cart</div>';
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('public.index.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('public.index.index');
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
        $rowId = $id;
        $qty = $request->qty;
        $result = array(
            'message'=> '',
            'total' => Cart::subtotal(),
            'qty'=> Cart::count()
            );
        if(Cart::update($rowId,$qty)){
            $result['message'] = '<div class="alert alert-success">Your cart had been updated</div>';
            $result['total'] = Cart::subtotal();
            $result['qty'] = Cart::count();
        }else{
            $result['message'] = '<div class="alert alert-danger">Could update cart, please try again</div>';
        };
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = array(
            'message'=> '',
            'total' => Cart::subtotal(),
            'qty'=> Cart::count()
            );
        if(Cart::remove($id)==null){
            $result['message'] = '<div class="alert alert-success">Removed Item successfully</div>';
            $result['total'] = Cart::subtotal();
            $result['qty'] = Cart::count();
        }else{
            $result['message'] = '<div class="alert alert-danger">Could not remove item, please try again</div>';
        };
        return $result;
    }
}
