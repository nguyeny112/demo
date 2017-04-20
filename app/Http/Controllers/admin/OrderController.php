<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Order_Detail;
use Excel;

class OrderController extends Controller
{

   public function __construct(){
    $this->middleware('adminlevelonly', ['except' => ['index','show','postUpdate']]);
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(Order::count('product_id')->groupBy('product_id')->orderBy('product_id','DESC')->get());
        // dd($request->orderfrom);
        if($request->orderfrom&&$request->orderto){
            DB::enableQueryLog();
            // dd($request->orderto);
            $orderfrom = $request->orderfrom;
            $orderto = $request->orderto;
            $order = Order::orderBy('id','DESC')->whereBetween(DB::raw('date(created_at)'),[$orderfrom,$orderto])->paginate(getenv('ROW_COUNT'));
            // dd(DB::getQueryLog());
        }else{
            $order = Order::orderBy('id','DESC')->paginate(getenv('ROW_COUNT'));
        }
        return view('admin.order.index',['order'=>$order]);
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.order.show',['order'=>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function getUpdate(Request $request, Order $order)
    {
        // return "??23?";
        return redirect()->route('admin.index.index');
    }    
    public function postUpdate($id, Request $request)
    {
        // dd($id);

        $orderItem = Order::findOrfail($id);
        $orderItem->payment_id = $request->payment;
        $orderItem->status = $request->status;
        // DB::table('orders')->where('id',$request->id)->update(
        //     ['status'=>$request->status,'payment_id'=>$request->payment]);
        if($orderItem->update()){
            // var_dump($orderItem);
            return '<div class="row message">
            <div class="col-lg-12">
                <div class="alert alert-info">
                    Save order successfully
                </div>
            </div>
        </div>';
    }else{
        return false;
    }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function exportExcel(Request $request){
        $order = Order::orderBy('id')->whereBetween(DB::raw('date(created_at)'),[$request->from,$request->to])->get();
        if($order->count()==0){
            $request->session()->flash('errormsg','Cant export empty data');
            return redirect()->route('admin.order.index');
        }
        $order = $order->each(function($item,$key){
            if($item['status'] == 0)
                return $item['status'] = 'Pending';
            else if($item['status'] == 1)
                return $item['status'] = 'Shipping';
            else if($item['status'] == 2)
                return $item['status'] = 'Finished';
            else return $item['status'] = 'Rejected';
        });
        $order = $order->each(function($item,$key){
            $paymentname = $item->payment->payment_name;
            return $item['payment_id'] = $paymentname;
        });
        $order = $order->each(function($item,$key){
            if($item['status']!='Finished')
                return $item['updated_at'] = NULL;
        });
        $orderArray = $order->toArray();
        foreach($orderArray as $key=>$value){
            array_splice($orderArray[$key], 12);
        }
        Excel::create('SMP Shop-Data: '.$request->from.'-'.$request->to, function($excel) use ($orderArray,$request) {
            $excel->sheet('Orders Info', function($sheet) use ($orderArray,$request) {
                $sheet->fromArray($orderArray,null,'A5',true,false)->setAutoSize(true);
                $sheet->row(4, array(
                    'ID', 'Username','Shipping Address','Customer Phone','Customer Name','Customer Email','Order Message','Payment Method','Order Status','Order Value (VNĐ)','Created Date','Finished Date'
                    ));
                $sheet->cells('A4:L4',function($cells){
                    $cells->setBackground('#214761')->setFontColor('#ffffff')->setFontFamily('Calibri');
                });
                $sheet->setBorder('A5:L'.(count($orderArray)+4), 'thin');
                $sheet->cell('C1', function($cell) {
                    $cell->setValue('SMP SHOP')->setFont(array(
                        'family'     => 'Calibri',
                        'size'       => '46',
                        'bold'       =>  true
                        ))->setFontColor('#B4722B');});
                $sheet->cell('D1', function($cell) {
                    $cell->setValue('Order Statistics')->setFont(array(
                        'family'     => 'Calibri',
                        'size'       => '26',
                        'bold'       =>  true
                        ))->setFontColor('#214761');});

                $sheet->cell('C2', function($cell) {
                    $cell->setValue('From Date:')->setFont(array(
                        'family'     => 'Calibri',
                        'size'       => '16',
                        'bold'       =>  true
                        ))->setFontColor('#000');});
                $sheet->cell('E2', function($cell) {
                    $cell->setValue('Total Order:')->setFont(array(
                        'family'     => 'Calibri',
                        'size'       => '16',
                        'bold'       =>  true
                        ))->setFontColor('#000');});
                $sheet->cell('E3', function($cell) {
                    $cell->setValue('Total Value:')->setFont(array(
                        'family'     => 'Calibri',
                        'size'       => '16',
                        'bold'       =>  true
                        ))->setFontColor('#000');});
                $sheet->cell('F2', function($cell) use($request,$orderArray) {
                    $cell->setValue(count($orderArray));
                });
                $sheet->cell('F3', function($cell) use($request,$orderArray) {
                    $cell->setValue('=SUM(J5:J'.(count($orderArray) + 4).')');
                });
                $sheet->cell('C3', function($cell) {
                    $cell->setValue('To Date:')->setFont(array(
                        'family'     => 'Calibri',
                        'size'       => '16',
                        'bold'       =>  true
                        ))->setFontColor('#000');});
                $sheet->cell('D2', function($cell) use($request) {
                    $cell->setValue($request->from);
                });
                $sheet->setColumnFormat(array(
                    'J' => '#,##0.00_-'
                    ));
                $sheet->cell('D3', function($cell) use($request) {
                    $cell->setValue($request->to);
                });
                $sheet->cell('I'.(count($orderArray)+5), function($cell) use($request) {
                    $cell->setValue('Total:')->setFont(['bold'=>true]);
                });
                $sheet->cell('J'.(count($orderArray)+5), function($cell) use($orderArray,$request) {
                    $cell->setValue('=SUM(J5:J'.(count($orderArray) + 4).')');
                });
            });

        })->export('xls');
        return $result;
    }
    public function destroy($id)
    {
        $delOrder = Order::findOrfail($id);
        $delOrder->delete();
        return 'pass';
    }
}
