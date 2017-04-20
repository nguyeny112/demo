@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>Order Management</h2>   
	</div>
</div>              
<!-- /. ROW  -->
<hr />
<div class="ajaxmessage">
  
</div>
@include('errors.message')
@include('errors.error')

<!-- /. ROW  --> 

<div class="row" style="padding-left:10px">
<form action="{{ route('admin.order.index') }}" method="GET" class="form-inline">
{{ csrf_field() }}
  <div class="form-group col-md-3">
    <label>From: </label>
    @php
      if(Request::get('orderfrom')){
        $startdate = Request::get('orderfrom');
      }else if($order->count()>0){
        $startdate = $order->sortBy('created_at')->first()->created_at->toDateString();
      }else{
        $startdate = Carbon\Carbon::today()->toDateString();
      }
    @endphp
     <input type="date" name="orderfrom" class="orderfrom form-control border-input" value="{{ $startdate }}">
   </div>  
  <div class="col-md-3 form-group">
    <label>To: </label>
    @php
     if(Request::get('orderto')){
        $curdate = Request::get('orderto');
      }else{
        $curdate = Carbon\Carbon::today()->toDateString();
      }
    @endphp
     <input type="date" name="orderto" class="orderto form-control border-input" value="{{ $curdate }}">
   </div>
  <div class="form-group col-md-1">
     <input type="submit" class="btn btn-primary" value="Filter">
   </div>   
   </form>
  <div class="form-group col-md-1">
  <form action="{{ route('admin.order.excel') }}" id="excelForm" method="POST">
  {{ csrf_field() }}
    <input type="hidden" name="from" class="fromdate" value="{{ $startdate }}">
    <input type="hidden" name="to" class="to" value="{{ $curdate }}">
     <button id="excelbtn" class="btn btn-success"><span class="glyphicon glyphicon-export"></span> Export to Excel</button>
     </form>
   </div> 
</div>
@if($order->count()>0)
<div class="row text-center pad-top">
	 <div class="row col-md-12 custyle" style="margin-left:10px">
    <table class="table table-striped custab">
          <input type="hidden" name="_token" value="{{ csrf_token()}}">
          <input type="hidden" name="_url" value="/admincp/order">
    <thead>
        <tr>
            <th class="text-center" width="12%">Created Date</th>
            <th class="text-center" width="12%">Email</td>
            <th class="text-center">Username</td>
            <th  class="text-center">Name</td>
            <th  class="text-center">Status</th>
            <th  class="text-center">Payment</th>
            <th  class="text-center">Amount</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    @foreach($order as $item)
    @php
        $editUrl = route('admin.order.edit',['id'=>$item->id]);
        $delUrl = route('admin.order.destroy',['id'=>$item->id]);
    @endphp
            <tr class="tablecontainer" id="{{ $item->id }}">
                    <td class="text-center">{{ $item->created_at }}</td>
                    <td class="text-center">{{ $item->useremail }}</td>
                    <td class="text-center username">{{ $item->username }}</td>
                    <td class="text-center">{{ $item->fullname }}</td>
                    <td class="text-center formajax">
                        <select name="status" class="status form-control border-input">
                          <option value="0" {{ ($item->status==0?'selected':'') }}>Pending</option>
                          <option value="1" {{ ($item->status==1?'selected':'') }}>Shipping</option>
                          <option value="2" {{ ($item->status==2?'selected':'') }}>Finished</option>
                          <option value="3" {{ ($item->status==3?'selected':'') }}>Rejected</option>
                        </select>
                    </td>
                    <td class="text-center">
                    <select name="payment" class="payment form-control border-input">
                    @foreach($paymentList as $payment)
                          <option value="{{ $payment->id }}" {{ ($payment->id==$item->payment->id?'selected':'') }}>{{ $payment->payment_name }}</option>
                          @endforeach
                        </select>
                    </td>
                    <td  class="text-center">{{ number_format($item->amount) }} VNĐ</td>
                    <td class="text-center">
                    <a class='btn btn-info btn-xs save-btn'><span class="glyphicon glyphicon-glyphicon glyphicon-ok"></span> Save</a> 
                    <a class='btn btn-success btn-xs' onclick="window.open('{{ route('admin.order.show',['id'=>$item->id]) }}')"><span class="glyphicon glyphicon-glyphicon glyphicon-eye-open"></span> View</a> 
                    @if(Auth::user()->level==1)
                    <a class='btn cbtn btn-danger btn-xs delbtn'><span class="glyphicon glyphicon-glyphicon glyphicon-remove"></span> Del</a> 
                    @endif
                    </td>
            </tr>          
         @endforeach
    </table>
    </div>
</div>   
<div class="row">
    <div class="col-lg-12">
            {{ $order->links() }}
    </div>
</div>
@else
  <h2 class="text-center pad-top">No order between selected dates.</h2>
@endif
</div>
<script type="text/javascript">
  $( document ).ready(function() {
    $('.save-btn').on('click',function(){
      var parent = $(this).closest('.tablecontainer');
      var status = parent.find('.status').val();
      var payment = parent.find('.payment').val();
      var id = parent.attr('id');
      var token = $('input[name="_token"]').val();
      // console.log(token);
      $.ajax({
          type: 'POST',
          url: '/admincp/order/updateItem/'+id,
          data: {
            _token:token,
            status:status,
            payment:payment
          },
          success: function(result) {
            console.log(result);
              $('.ajaxmessage').html(result);
              setTimeout(function(){
                $('.message').slideUp('slow');
              },3000);
          },
          error: function(data){
              console.log(data.responseText);
              $('.ajaxmessage').html(data.responseText);
            }

      });
    });
});
</script>
@stop