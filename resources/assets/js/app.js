
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#slider',
    data:{
    	btnSwitch:false,
    	btn:[

    	]
    },
    methods:{
    	switchbtn:function(e){
    		// console.log(e);
    		// this.btnSwitch = !this.btnSwitch;
    		// var $this = $(e.target);
    		// console.log($this);
    		// if($this.hasClass('edit-btn')){
	    	// 	$this.removeClass('edit-btn');
	    	// 	$this.removeClass('btn-info');
	    	// 	$this.addClass('btn-success');
	    	// 	$this.addClass('save-btn');
	    	// 	$this.html('<span class="glyphicon glyphicon-glyphicon glyphicon-ok"></span> Save');
	    	// 	$this.siblings('.del-form').hide();
	    	// }else{
	    	// 	$this.removeClass('save-btn');
	    	// 	$this.removeClass('btn-success');
	    	// 	$this.addClass('btn-info');
	    	// 	$this.addClass('edit-btn');
	    	// 	$this.html('<span class="glyphicon glyphicon-glyphicon glyphicon-edit"></span> Edit');
	    	// 	$this.siblings('.del-form').show();
	 	   // 	}
    	},
    },
    created:function(){
    	// var total = $('.edit-btn').length;
    	// console.log(total);
    	// for(var i=1;i<=total;i++){
    	// 	this.btn.push({
    	// 		name:i,
    	// 	});
    	// }
    	// console.log(this.btn);
    }
});
