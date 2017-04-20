@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>Theme Option</h2>   
	</div>
</div>              
<!-- /. ROW  -->
<hr style="margin:0px"/>
@include('errors.error')
@include('errors.message')

<div class="ajaxmessage">
	
</div>
<div class="row text-center pad-top">
	<div class="row col-md-12 custyle" style="margin-left:10px">
		<h3>Home Slider Manager</h3>
		<a class='btn btn-success btn-xs addbtn'><span class="glyphicon glyphicon-glyphicon glyphicon-plus"></span> Add Slider</a> 
		<table class="table table-striped custab" id="slider">
			<input type="hidden" name="_token" value="{{ csrf_token()}}">
			<input type="hidden" name="_url" value="/admincp/themeoption">
			<thead class="tableheading">
				<tr>
					<th class="text-center">Slide Title</th>
					<th class="text-center">Desc</th>
					<th class="text-center">Image</th>
					<th class="text-center">Link</th>
					<th class="text-center">Button Text</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tr class="newslider tablecontainer" style="display:none" id="">
				<td class="text-center title" width="15%">
					<input type="text" name="title" class="form-control border-input" value="" required>
					<span class="default"></span>
				</td>
				<td class="text-center desc" width="20%">
					<input type="text" name="title" class="form-control border-input" value="" required>
					<span class="default"></span>
				</td>
				<td class="text-center image" width="20%">
					<img width=160px src="" alt="" style="display:none" />
					<input type="file" name="picture" class="form-control border-input" required>
				</td>
				<td class="text-center link" width="20%">
					<input type="text" name="title" class="form-control border-input" value="" required>
					<span class="default"></span>
				</td>
				<td class="text-center buttontext" width="10%">
					<input type="text" name="title" class="form-control border-input" value="" required>
					<span class="default"></span>
				</td>
				<td class="text-center">
				<div class="cbtn-group group-1" style="display:none">
						<a class='btn cbtn btn-info btn-xs editbtn'><span class="glyphicon glyphicon-glyphicon glyphicon-edit"></span> Edit</a> 
						<a class='btn cbtn btn-danger btn-xs delbtn'><span class="glyphicon glyphicon-glyphicon glyphicon-remove"></span> Del</a> 
					</div>
					<div class="cbtn-group group-2">
						<a href="javascript:void(0)" class='btn cbtn btn-success btn-xs createbtn'><span class="glyphicon glyphicon-glyphicon glyphicon-ok"></span> Save</a> 
						<a class='btn cbtn btn-warning btn-xs canceladdbtn'><span class="glyphicon glyphicon-glyphicon glyphicon-remove"></span> Cancel</a> 
					</div>
					</td>
				{{-- <script>
					function removeAdd(){
						// concsole.log('clicked');
						$(event.target).closest('.newsliderclone').remove();
					}
				</script> --}}
			</tr>
			@foreach($slide as $item)
			<tr class="tablecontainer" id="{{ $item->id }}">
				<td class="text-center title" width="15%">
					<input type="hidden" name="title" class="form-control border-input" value="{{ $item->title }}" required>
					<span class="default">{{ $item->title }}</span>
				</td>
				<td class="text-center desc" width="20%">
					<input type="hidden" name="desc" class="form-control border-input" value="{{ $item->desc }}" required>
					<span class="default">{{ $item->desc }}</span>
				</td>
				<td class="text-center image" width="20%">
					<img width=160px src="/storage/app/public/{{ $item->image_path }}" alt=""/>
					<input type="hidden" style="display:block;margin-top:10px" name="picture" class="form-control border-input">
				</td>
				<td class="text-center link" width="20%">
					<input type="hidden" name="link"  class="form-control border-input" value="{{ $item->link }}" required>
					<span class="default">{!! $item->link !!}</span>
				</td>
				<td class="text-center buttontext" width="10%">
					<input type="hidden" name="buttontext" class="form-control border-input" value="{{ $item->buttontext }}" required>
					<span class="default">{{ $item->buttontext }}</span>
				</td>
				<td class="text-center">
					<div class="cbtn-group group-1">
						<a class='btn cbtn btn-info btn-xs editbtn'><span class="glyphicon glyphicon-glyphicon glyphicon-edit"></span> Edit</a> 
						<a class='btn cbtn btn-danger btn-xs delbtn'><span class="glyphicon glyphicon-glyphicon glyphicon-remove"></span> Del</a> 
					</div>
					<div class="cbtn-group group-2" style="display:none">
						<a href="javascript:void(0)" class='btn cbtn btn-success btn-xs savebtn'><span class="glyphicon glyphicon-glyphicon glyphicon-ok"></span> Save</a> 
						<a class='btn cbtn btn-warning btn-xs cancelbtn'><span class="glyphicon glyphicon-glyphicon glyphicon-remove"></span> Cancel</a> 
					</div>
				</td>
			</tr>          
			@endforeach
		</table>
		<div class="pagination">
			{{ $slide->links() }}
		</div>
	</div>
</div>   
@stop