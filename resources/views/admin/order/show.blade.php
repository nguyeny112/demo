<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head class="printableArea1">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SMPShop Receipt: Customer - {{ $order->fullname }}</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="{{ $adminURL }}/assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="{{ $adminURL }}/assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="{{ $adminURL }}/assets/css/custom.css" rel="stylesheet" />
  <link href="{{ $adminURL }}/assets/css/style.css" rel="stylesheet" />
  <script src="{{ $adminURL }}/assets/js/jquery-3.2.0.min.js"></script>
  <script src="{{ $adminURL }}/assets/js/script.js"></script>

  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body style="margin-top:20px" class="printableArea2">
  <div class="container">
    <div class="row">
      <div class="well col-xs-10 col-sm-10 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <address>
              <strong>SMP Shop</strong>
              <br>
              54 Ninh Ton
              <br>
              Danang, Vietnam
              <br>
              <abbr title="Phone">Phone:</abbr> 0935579194
            </address>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6 text-right">
            <p>
              <em>Date: {{ $order->created_at }}</em>
            </p>
            <p>
              <em>Receipt: #{{ $order->id }}</em>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="text-center">
            @php
            if($order->status==0){
              $status = "Pending";
            }else if($order->status==1){
              $status = "Shipping";
            }else if($order->status==2){
              $status = "Finished on ".$order->updated_at;
            }else{
              $status = "Rejected";
            }
            @endphp
            <h1>Receipt</h1><h4>(Status: {{ $status }})</h4>
          </div>
        </span>
        <div class="text-left" style="padding-left:20px">
          Customer Name: {{ $order->fullname }}<br>
          Address: {{ $order->useraddress }}<br>
          Phone: {{ $order->userphone }}<br>
          Email: {{ $order->useremail }}<br>
          Message: {{ $order->moreinfo }}<br>
          Payment Method: {{ $order->payment->payment_name }}
        </div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Product</th>
              <th>Quantity</th>
              <th class="text-center">Price</th>
              <th class="text-center">(-%)</th>
              <th class="col-md-2 text-center">Total</th>
            </tr>
          </thead>
          <tbody>
            @php
            $detail = $order->order_detail;
            $tax = 0;
            $temptotal = 0;
            @endphp
            @foreach($detail as $subitem)
            @php
            $price = $subitem->product->price;
            $totalitem = $price*(100-$subitem->product->discount)/100*$subitem->quantity;
            @endphp
            <tr>
              <td class="col-md-6"><em>{{ $subitem->product->pname }}</em></h4></td>
              <td class="col-md-1 text-center">{{ $subitem->quantity }}</td>
              <td class="col-md-2" style="text-align: center"> {{ number_format($price) }} VNĐ</td>
              <td class="col-md-1 text-center">{{ $subitem->product->discount }} %</td>
              <td class="col-md-2 text-center">{{ number_format($totalitem) }} VNĐ</td>
            </tr>
            @php
            $temptotal += $totalitem;
            @endphp
            @endforeach
            <tr>
              <td>   </td>
              <td>   </td>
              <td class="text-right">
                <p>
                  <strong>Subtotal: </strong>
                </p>
                <p>
                  <strong>Tax: </strong>
                </p></td>
                <td class="text-center" colspan="3">
                  <p>
                    <strong>{{ number_format($temptotal) }} VNĐ</strong>
                  </p>
                  <p>
                    <strong>{{ number_format($tax) }} VNĐ</strong>
                  </p></td>
                </tr>
                <tr>
                  <td>   </td>
                  <td>   </td>
                  <td class="text-right"><h4><strong>Total:</strong></h4></td>
                  <td class="text-center text-danger" colspan="3"><h4><strong> {{ number_format($temptotal + $tax) }} VNĐ</strong></h4></td>
                </tr>
              </tbody>
            </table>
            <div class="row noprint" style="padding:30px">
            <div class="col-md-9">
              <a type="button" class="btn btn-success btn-lg btn-block" onclick="window.close()">
                Close Order Detail <span class="glyphicon glyphicon-glyphicon glyphicon-remove"></span>
              </a>
              </div>
              <div class="col-md-3">
                  <a type="button" class="btn btn-primary btn-lg btn-block printbtn">
                 Print Order <span class="glyphicon glyphicon-glyphicon glyphicon-print"></span>
                </a>
              </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    @php
        // $query = DB::table('order_details')->select(DB::raw('count(id)'),'product_id')->groupBy('product_id')->orderBy(DB::raw('count(id)'),'DESC')->take(2)->get();
        // dd($query);

    @endphp
  </body>