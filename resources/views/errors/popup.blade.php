   @if(Session::has('popupmsg'))
   <script>
	smoke.alert("{{ Session::get('popupmsg') }}", function(e){
}, {
	ok: "OK",
	classname: "custom-class"
});
</script>
   @endif
