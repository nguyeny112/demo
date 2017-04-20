   @if(Session::has('errormsg'))
   <div class="row errormsg">
   	<div class="col-lg-12 ">
   		<div class="alert alert-danger">
   			{{ Session::get('errormsg') }}
   		</div>
   	</div>
   </div>
   <script type="text/javascript">
   		setTimeout(function(){
   			$('.errormsg').slideUp();
   		},3000);
   </script>
   @endif