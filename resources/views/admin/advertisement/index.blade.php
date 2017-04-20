@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>Advertisement Management</h2>   
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
    <a href="{{ route('admin.advertisement.create') }}" class="btn btn-primary btn-xs pull-left"><b>+</b> Add new advertisements</a>
        <tr>
            <th class="text-center" style="width:4%">ID</th>
            <th class="text-center">Ad Title</th>
            <th class="text-center">Ad Desc</th>
            <th class="text-center">Ad Link</th>
            <th class="text-center">Ad Image</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    @foreach($advertisement as $item)
    @php
        $editUrl = route('admin.advertisement.edit',['id'=>$item->id]);
        $delUrl = route('admin.advertisement.destroy',['id'=>$item->id]);
    @endphp
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->ads_title }}</td>
                <td>{{ $item->ads_desc }}</td>
                <td>{{ $item->ads_link }}</td>
                <td><img style="width:100px;height:auto" src="\storage\app\public\{{ $item->ads_image }}"/></td>
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
            {{ $advertisement->links() }}
    </div>
</div>
</div>
@stop