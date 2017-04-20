   @if(Session::has('warnmsg'))
   <div class="row warnmsg">
   	<div class="col-lg-12 ">
   		<div class="alert alert-warning">
   			{{ Session::get('warnmsg') }}
   		</div>
   	</div>
   </div>
   <script type="text/javascript">
   		setTimeout(function(){
   			$('.warnmsg').slideUp();
   		},3000);
   </script>
   @endif