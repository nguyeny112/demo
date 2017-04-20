@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>ADMIN DASHBOARD</h2>   
	</div>
</div>              
<!-- /. ROW  -->
<hr />
<div class="row">
	<div class="col-lg-12 ">
		<div class="alert alert-info">
			<strong>Welcome Jhon Doe ! </strong> You Have No pending Task For Today.
		</div>
		
	</div>
</div>
<!-- /. ROW  --> 
<div class="row text-center pad-top">
	 <div class="row col-md-12 custyle" style="margin-left:10px">
    <table class="table table-striped custab">
    <thead>
    <a href="{{ route('admin.product.create') }}" class="btn btn-primary btn-xs pull-left"><b>+</b> Add new categories</a>
        <tr>
            <th class="text-center" style="width:4%">ID</th>
            <th class="text-center">Title</th>
            <th class="text-center">Parent ID</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
            <tr>
                <td>1</td>
                <td>News</td>
                <td>News Cate</td>
                <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Products</td>
                <td>Main Products</td>
                <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Blogs</td>
                <td>Parent Blogs</td>
                <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
            </tr>
    </table>
    </div>
</div>   
<!-- /. ROW  -->   
<div class="row">
	<div class="col-lg-12 ">
		<br/>
		<div class="alert alert-danger">
			<strong>Want More Icons Free ? </strong> Checkout fontawesome website and use any icon <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">Click Here</a>.
		</div>
		
	</div>
</div>
</div>
@stop