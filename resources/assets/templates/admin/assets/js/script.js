  $( document ).ready(function() {
 // PRODUCT TABLE
$('.printbtn').on('click',function(){
	console.log('clicked');
	var noprint = $(this).closest('.noprint');
	 noprint.hide();
	var w = window.print();
	 noprint.show();
});


 //print
  $('.replybtn').on('click',function(){
    // var test = $(this).html();
    // console.log(e);
    var parent = $(this).closest('tr'); 
    var title = parent.find('.ctitle').text();
    var name = parent.find('.cname').text();
    var email = parent.find('.cemail').text();
    var cid = parent.find('.cid').val();
    $('.reply-title').val('Re: '+title);
    $('.reply-name').val(name);
    $('.reply-email').val(email);
    $('.replyid').val(cid);
    $('#replyModal').modal();
  });
$('#excelbtn').on('click',function(){
	var from = $('.orderfrom').val();
	var to = $('.orderto').val();
	$('.fromdate').val(from);
	$('.todate').val(to);
	$('#excelForm').submit();
});

 // 
//ADD SLIDER AJAX

$('.editbtn').on('click',function(){
	var parent = $(this).closest('.tablecontainer');
	$(this).parent('.cbtn-group').hide();
	$(this).parent('.cbtn-group').siblings().show();
	parent.find('input').attr('type','text');
	parent.find('.default').hide();
	var image = parent.children('.image');
	image.find('input').attr('type','file');
		// image.find('img').hide();
	});
$('.cancelbtn').on('click',function(){
	var parent = $(this).closest('.tablecontainer');
	parent.find('input').attr('type','hidden');
	parent.find('.default').show();
	parent.find('.group-2').hide();
	parent.find('.group-1').show();
});

$('.canceladdbtn').on('click',function(){
	$(this).closest('.newsliderclone').remove();
});
$('.addbtn').on('click',function(){
	$newslide = $('.newslider').clone(true,true);
	$newslide.removeClass('newslider');
	$newslide.addClass('newsliderclone');
	$newslide.appendTo('.tableheading');
	$newslide.first().show();
});
$('.newsliderclone').find('.canceladdbtn').on('click',function(){
	console.log('clicked');
	$(this).closest('.tablecontainer').remove();
});

$('.delbtn').on('click',function(){
	var parent = $(this).closest('.tablecontainer');
	var id = parent.attr('id');
	var token = $('input[name="_token"]').val();
	var c_url = $('input[name="_url"]').val();
	$.ajax({
          type: 'POST',
          url: c_url +'/'+id,
          data: {
          	_method:'delete',
            _token:token,
          },
          success: function(result) {
          	// console.log(result);
          		if(result=='pass'){
              $('.ajaxmessage').html('<div class="row message"><div class="col-lg-12"><div class="alert alert-info">Deleted successfully</div></div></div>');
              parent.remove();
              setTimeout(function(){
                $('.message').slideUp('slow');
              },3000);
              }
          },
          error: function(data){
          		// console.log(data);
              $('.ajaxmessage').html('<div class="row message"><div class="col-lg-12"><div class="alert alert-danger">Slider is Deleted unsuccessfully</div></div></div>');
            }
      });
	// console.log('abc');
});
$('.savebtn').on('click',function(){
	var parent = $(this).closest('.tablecontainer');
	var title = parent.find('.title input').val();
	var desc = parent.find('.desc input').val();
	var link = parent.find('.link input').val();
	var buttontext = parent.find('.buttontext input').val();
	var img = parent.find('.image input');
	var id = parent.attr('id');
	var token = $('input[name="_token"]').val();
	var formData = new FormData();
	if(img.val()!=''){
		formData.append('image', img[0].files[0]); 
	};
	formData.append('title',title);
	formData.append('link',link);
	formData.append('buttontext',buttontext);
	formData.append('desc',desc);
	$.ajax({
		url: '/admincp/themeoption/updateItem/'+id,
		method: 'POST',
		processData: false,
		contentType: false,
		headers: {
			'X-CSRF-TOKEN': token
		},
		data:formData,
		success: function(result) {
			console.log(result);
			$('.ajaxmessage').html('<div class="row message"><div class="col-lg-12"><div class="alert alert-info">Save Slider successfully</div></div></div>');
			if(img.val()!=''){
				parent.find('img').attr('src','/storage/app/public/'+result.image_path);
			};
			parent.find('.group-2').hide();
			parent.find('.group-1').show();
			parent.find('input').attr('type','hidden');
			parent.find('.default').show();
			parent.find('.title .default').text(result.title);
			parent.find('.desc .default').text(result.desc);
			parent.find('.link .default').html(result.link);
			parent.find('.buttontext .default').text(result.buttontext);
			setTimeout(function(){
				$('.message').slideUp('slow');
			},3000);
		},
		error: function(data){
			// $('.ajaxmessage').html(data.responseText);
			$('.ajaxmessage').html('<div class="row message"><div class="col-lg-12"><div class="alert alert-danger">Please enter all valid data</div></div></div>');
		}
	});
});
$('.createbtn').on('click',function(){
	// console.log('asdasd');
	var parent = $(this).closest('.tablecontainer');
	var title = parent.find('.title input').val();
	var desc = parent.find('.desc input').val();
	var link = parent.find('.link input').val();
	var buttontext = parent.find('.buttontext input').val();
	var img = parent.find('.image input');
	var id = parent.attr('id');
	var token = $('input[name="_token"]').val();
	var formData = new FormData();
	formData.append('image', img[0].files[0]); 
	formData.append('title',title);
	formData.append('link',link);
	formData.append('buttontext',buttontext);
	formData.append('desc',desc);
	// console.log(img.val());
	$.ajax({
		url: '/admincp/themeoption',
		method: 'POST',
		processData: false,
		contentType: false,
		headers: {
			'X-CSRF-TOKEN': token
		},
		data:formData,
		dataType: 'json',
		success: function(result) {
			$('.ajaxmessage').html('<div class="row message"><div class="col-lg-12"><div class="alert alert-info">New Slider is created successfully</div></div></div>');
			parent.find('.title .default').text(result.title);
			parent.find('.desc .default').text(result.desc);
			parent.find('.link .default').html(result.link);
			parent.find('.buttontext .default').text(result.buttontext);
			parent.find('input').attr('type','hidden');
			parent.find('img').attr('src','/storage/app/public/'+result.image_path);
			parent.find('.group-2').hide();
			parent.find('.group-1').show();
			parent.attr('id',result.id);
			parent.find('img').show();
			parent.insertAfter('.tableheading');
			parent.show();
			setTimeout(function(){
				$('.message').slideUp('slow');
			},3000);
		},
		error: function(data){
			var errors = JSON.parse(data.responseText);			
			Object.keys(errors).forEach(function(key){
				$('.ajaxmessage').append('<div class="row message"><div class="col-lg-12"><div class="alert alert-danger">'+errors[key]+'</div></div></div>');
			});
			setTimeout(function(){
				$('.message').slideUp('slow');
			},3000);
		}
	});
});
//ENDADDSLIDER AJAX
// MENU COLLAPSE
$('#tags').tokenfield();
$('#tags').on('tokenfield:createdtoken', function (e) {
	$('#tags-tokenfield').removeAttr('placeholder');
});
if($('.secondlevelnav').hasClass('active-link')){
	$('#collapseOne').addClass('in');
};
var $collapse = $('.collapseproduct');
var $collapseSpan = $collapse.find('span');
if($('#collapseOne').hasClass('in')){
	$collapseSpan.addClass('glyphicon-chevron-up');
}else{
	$collapseSpan.addClass('glyphicon-chevron-right');
};
$collapse.on('click',function(){
	if($('#collapseOne').hasClass('in')){
		$collapseSpan.removeClass('glyphicon-chevron-up');
		$collapseSpan.addClass('glyphicon-chevron-right');
	}else{
		$collapseSpan.removeClass('glyphicon-chevron-right');
		$collapseSpan.addClass('glyphicon-chevron-up');
	};
});

//Confirm Delete
$(".del-form").on("submit", function(){
	return confirm("Do you want to delete this item?");
});
$(".delbtn").on("click", function(){
	return confirm("Do you want to delete this item?");
});
//CKEDITOR
CKEDITOR.replace( 'detail', {
	filebrowserBrowseUrl: '{{ $adminURL }}/assets/js/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl: '{{ $adminURL }}/assets/js/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl: '{{ $adminURL }}/assets/js/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl: '{{ $adminURL }}/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl: '{{ $adminURL }}/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl: '{{ $adminURL }}/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
} );
CKEDITOR.replace( 'spec', {
	filebrowserBrowseUrl: '{{ $adminURL }}/assets/js/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl: '{{ $adminURL }}/assets/js/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl: '{{ $adminURL }}/assets/js/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl: '{{ $adminURL }}/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl: '{{ $adminURL }}/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl: '{{ $adminURL }}/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
} );
});
