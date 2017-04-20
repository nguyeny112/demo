<div class="footer">


   <div class="row">
    <div class="col-lg-12" >
        &copy;  2014 SMPShop.com | Design by: Binarytheme.com
    </div>
</div>
</div>


<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{ $adminURL }}/assets/js/bootstrap.min.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="{{ $adminURL }}/assets/js/custom.js"></script>
<script src="{{ $adminURL }}/assets/js/ckeditor/ckeditor.js"></script>
<script src="{{ $adminURL }}/assets/js/ckfinder/ckfinder.js"></script>
<script src="{{ $adminURL }}/assets/js/bootstrap-tokenfield.min.js"></script>
<script src="{{ $adminURL }}/assets/js/datatable.js"></script>
<script src="{{ $adminURL }}/assets/js/script.js"></script>
<script>
	 $('#productTable').DataTable( {
 	"columnDefs": [
    { "orderable": false, "targets": [2,3,5,6] }
  	]
    } );
</script>
</body>
</html>
