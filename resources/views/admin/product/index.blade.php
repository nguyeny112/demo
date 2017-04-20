@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>Product Management</h2>   
	</div>
</div>              
<!-- /. ROW  -->
<hr />
@include('errors.message')
<!-- /. ROW  --> 
<div class="row text-center pad-top">
  <div class="row col-md-12 custyle" style="margin-left:10px">
   <a href="{{ route('admin.product.create') }}" class="btn btn-primary btn-xs pull-left"><b>+</b> Add new products</a>
   <table class="table table-striped custab" id="productTable" class="display" cellpadding="0" width="100%" style="margin-top:25px">
    <thead>
        <tr>
            <th class="text-center" style="width:6%">ID</th>
            <th class="text-center">Product Name</th>
            <th class="text-center">Category</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Price</th>
            <th class="text-center">Image</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    @foreach($product as $item)
    @php
        // dd($item->category);
    $editUrl = route('admin.product.edit',['id'=>$item->id]);
    $delUrl = route('admin.product.destroy',['id'=>$item->id]);
    @endphp
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->pname }}</td>
        <td>{{ $item->category->cat_name }}</td>
        <td>{{ $item->brand->brand_name }}</td>
        <td>{{ number_format($item->price) }} VNĐ</td>
        <td><img style="width:100px;height:auto" src="\storage\app\public\{{ $item->image }}"/></td>
        <td class="text-center">
            <a class='btn btn-info btn-xs' href="{{ $editUrl }}"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
            <form class="del-form" action="{{ $delUrl }}" method="POST">{{ csrf_field() }}{{ method_field('DELETE') }}<button type="submit" class="del-btn btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</button></form>
        </td>
    </tr>
    @endforeach
</table>
<script>
    
</script>
</div>
</div>   
</div>
@stop