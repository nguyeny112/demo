@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>User Management</h2>   
	</div>
</div>              
<!-- /. ROW  -->
<hr />
@include('errors.warning')
@include('errors.message')
@include('errors.error')

<!-- /. ROW  --> 
<div class="row text-center pad-top">
	 <div class="row col-md-12 custyle" style="margin-left:10px">
    <table class="table table-striped custab">
    <thead>
    <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-xs pull-left"><b>+</b> Add new user</a>
        <tr>
            <th class="text-center" style="width:4%">ID</th>
            <th class="text-center">Username</th>
            <th class="text-center">Fullname</th>
            <th class="text-center" style="width:20%">Address</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Level (ACL)</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    @foreach($user as $item)
    @if(Auth::user()->level==1 || Auth::user()->id == $item->id)
    @php
        $editUrl = route('admin.user.edit',['id'=>$item->id]);
        $delUrl = route('admin.user.destroy',['id'=>$item->id]);
        if($item->level == 1) $level = "Admin";
        else if($item->level==2) $level = "Moderator";
        else $level = "Member";
    @endphp
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $level }}</td>
                <td class="text-center">
                <a class='btn btn-info btn-xs' href="{{ $editUrl }}"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                @if(Auth::user()->id!=$item->id)
                <form class="del-form" action="{{ $delUrl }}" method="POST">{{ csrf_field() }}{{ method_field('DELETE') }}<button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</button></form>
                @endif
                </td>
            </tr>
            @endif
         @endforeach
    </table>
    </div>
</div>   
<div class="row">
    <div class="col-lg-12">
            {{ $user->links() }}
    </div>
</div>
</div>
@stop