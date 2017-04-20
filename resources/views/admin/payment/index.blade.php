@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>Payment Management</h2>   
	</div>
</div>              
<!-- /. ROW  -->
<hr />
@include('errors.message')
<!-- /. ROW  --> 
<div class="row text-center pad-top">
	 <div class="row col-md-12 custyle" style="margin-left:10px">
    <table class="table table-striped custab">
    <thead>
    <a href="{{ route('admin.payment.create') }}" class="btn btn-primary btn-xs pull-left"><b>+</b> Add new payment</a>
        <tr>
            <th class="text-center" style="width:4%">ID</th>
            <th class="text-center">Payment Name</th>
            <th class="text-center">Payment Info</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    @foreach($payment as $item)
    @php
        $editUrl = route('admin.payment.edit',['id'=>$item->id]);
        $delUrl = route('admin.payment.destroy',['id'=>$item->id]);
    @endphp
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->payment_name }}</td>
                <td>{{ $item->payment_info }}</td>
                <td class="text-center">
                <a class='btn btn-info btn-xs' href="{{ $editUrl }}"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                <form class="del-form" action="{{ $delUrl }}" method="POST">{{ csrf_field() }}{{ method_field('DELETE') }}<button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</button></form>
                </td>
            </tr>
         @endforeach
    </table>
    </div>
</div>   
<div class="row">
    <div class="col-lg-12">
            {{ $payment->links() }}
    </div>
</div>
</div>
@stop