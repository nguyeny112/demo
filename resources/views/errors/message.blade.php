   @if(Session::has('msg'))
   <div class="row">
   	<div class="col-lg-12 ">
   		<div class="alert alert-info">
   			{{ Session::get('msg') }}
   		</div>
   	</div>
   </div>
   @endif
      @if(Session::has('fixedmsg'))
   <div class="row">
   	<div class="col-lg-12" style="position: fixed;top:50px">
   		<div class="alert alert-info">
   			{{ Session::get('fixedmsg') }}
   		</div>
   	</div>
   </div>
   @endif