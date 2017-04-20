@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>Contact Management</h2>   
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
        <tr>
          <th class="text-center" style="width:4%">ID</th>
          <th class="text-center">Contact Title</th>
          <th class="text-center">Contact Name</th>
          <th class="text-center">Contact Email</th>
          <th class="text-center" style="width:10%">Sent Date</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      @foreach($contact as $item)
      @php
      $editUrl = route('admin.contact.edit',['id'=>$item->id]);
      $delUrl = route('admin.contact.destroy',['id'=>$item->id]);
      @endphp
      <tr>
        <td>{{ $item->id }}</td>
        <input type="hidden" class="cid" value="{{ $item->id }}">
        <td class="ctitle">{{ $item->contact_title }}</td>
        <td class="cname">{{ $item->contact_name }}</td>
        <td class="cemail">{{ $item->contact_email }}</td>
        <td>{{ $item->created_at }}</td>
        <td class="text-center">
          @if($item->status==0)
          <a class='btn btn-success btn-xs replybtn' data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span> Reply</a> 
          @else
          <a class='btn btn-default btn-xs replybtn' data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span> Replied</a> 
          @endif
          <a class='btn btn-info btn-xs' data-toggle="modal" data-target="#detailModal{{ $item->id }}"><span class="glyphicon glyphicon-edit"></span> View Detail</a> 
          <form class="del-form" action="{{ $delUrl }}" method="POST">{{ csrf_field() }}{{ method_field('DELETE') }}<button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</button></form>
        </td>
      </tr>

      {{-- DETAIL MODAL --}}
      <div id="detailModal{{ $item->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">{{ $item->contact_title }}</h4>
            </div>
            <div class="container" style="text-align: left">
              <p>From: {{ $item->contact_name }} (Email: {{ $item->contact_email }} - Phone: {{ $item->contact_phone }})</p>
              <p>Sent Date: {{ $item->created_at }}</p>
              <div class="modal-body">
                <p>{{ $item->contact_detail }}</p>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
      @endforeach
      {{-- REPLY MODAL --}}
      <div id="replyModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width:80vw">
          <form action="{{ route('admin.contact.reply') }}" method="POST">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reply</h4>
              </div>
              <div class="container" style="text-align: left;width:100%">
                {{ csrf_field() }}
                <input type="hidden" name="replyid" class="replyid" value="">
                <p>Title:  <input type="text" name="title" value="" placeholder="Re: " class="form-control border-input reply-title"></p>
                <p>Contact Name: <input type="text" name="name" class="border-input form-control reply-name" value="" readonly=""></p>
                <p>To: <input type="text" name="email" class="border-input form-control reply-email" value="" readonly=""></p>
                <div class="form-group">    
                <label>Reply Content</label>
                <textarea name="content" class="form-control border-input reply-detail" placeholder="Reply Content" style="width:100%" required></textarea>
                </div>
              </div>
              <div class="modal-footer">
              <input type="submit" class="btn btn-info" value="Send Reply">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </table>
  </div>
</div>   
<div class="row">
  <div class="col-lg-12">
    {{ $contact->links() }}
  </div>
</div>
</div>

@stop