<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::pattern('slug','(.*)');
Route::pattern('slugcat','(.*)');

Route::pattern('provider','(.*)');

Route::pattern('id','([0-9]*)');

Route::group(['namespace' => 'admin','prefix' => 'admincp','middleware'=>['auth','adminaccess']],function(){
	Route::get('/',[
		'uses'=> 'IndexController@index',
		'as'=>'admin.index.index'
		]);
	// Route::group(['prefix' => 'product'],function(){
	// 	Route::get('/',[
	// 	'uses'=> 'ProductController@index',
	// 	'as'=>'admin.product.index'
	// 	]);
	// 	Route::get('/add',[
	// 	'uses'=> 'ProductController@create',
	// 	'as'=>'admin.product.create'
	// 	]);
	// });
	Route::resource('brand', 'BrandController',[
			'as'=>'admin'
		]);
	Route::resource('category', 'CategoryController',[
			'as'=>'admin'
		]);
	Route::resource('payment', 'PaymentController',[
			'as'=>'admin'
		]);
	Route::resource('contact', 'ContactController',[
			'as'=>'admin'
		],['only' => ['index','destroy']]);
	Route::post('contact',[
		'uses'=> 'ContactController@reply',
		'as'=>'admin.contact.reply'
		]);
	Route::resource('user', 'UserController',[
			'as'=>'admin'
		]);
	Route::resource('advertisement', 'AdvertisementController',[
			'as'=>'admin'
		]);
	Route::resource('product', 'ProductController',[
			'as'=>'admin'
		]);
	
	Route::resource('themeoption', 'ThemeOptionController',[
			'as'=>'admin'
		],['only'=>['index','destroy']]);
	Route::resource('order', 'OrderController',[
			'as'=>'admin'
		],['only' => ['index','show','destroy']]);
	Route::post('/order/excel',[
		'uses'=> 'OrderController@exportExcel',
		'as'=>'admin.order.excel'
		]);
	Route::get('/order/updateItem/{id}',[
		'uses'=> 'OrderController@getUpdate',
		'as'=>'admin.order.update'
		]);
	Route::post('/order/updateItem/{id}',[
		'uses'=> 'OrderController@postUpdate',
		'as'=>'admin.order.update'
		]);
	Route::get('/themeoption/updateItem/{id}',[
		'uses'=> 'OrderController@getUpdate',
		'as'=>'admin.themeoption.update'
		]);
	Route::post('/themeoption/updateItem/{id}',[
		'uses'=> 'ThemeOptionController@postUpdate',
		'as'=>'admin.themeoption.update'
		]);
});

// Auth
Route::get('/register.html',[
	'uses'=>'auth\AuthController@getRegister',
	'as' => 'global.auth.reg'	
	]);
Route::post('/register.html',[
	'uses'=>'auth\AuthController@postRegister',
	'as' => 'global.auth.reg'	
	]);
Route::get('/logout.html',[
	'uses'=>'auth\AuthController@logout',
	'as' => 'global.auth.logout'	
	]);
Route::get('/login.html',[
	'uses'=>'auth\AuthController@getLogin',
	'as' => 'global.auth.login'	
	]);
Route::post('/login.html',[
	'uses'=>'auth\AuthController@postLogin',
	'as' => 'global.auth.login'	
	]);
//SocialAuth
Route::get('/auth/{provider}', 'SocialAuthController@redirect');
// Route::get('/auth/google', 'SocialAuthController@redirect');

Route::get('/callback', 'SocialAuthController@callbackFB');
Route::get('/callback/google', 'SocialAuthController@callbackGoogle');

// Route::get('/callback/{}', 'SocialAuthController@callback');

//PUBLIC
Route::get('/tag/{slug}',[
	'uses'=>'smpshop\IndexController@getTag',
	'as' => 'public.index.tag'	
	]);
Route::get('/index.html', [
	'uses'=>'smpshop\IndexController@index',
	'as' => 'public.index.index'
	]);
Route::get('/', [
	'uses'=>'smpshop\IndexController@index',
	'as' => 'public.index.index'
	]);

Route::get('/product',[
	'uses'=>'smpshop\ProductController@index',
	'as' => 'public.product.index'	
	]);
Route::post('/product/filter',[
		'uses'=> 'smpshop\ProductController@filter',
		'as'=>'public.product.filter'
		]);
Route::post('/suggestsearch',[
		'uses'=> 'smpshop\ProductController@suggestSearch',
		'as'=>'public.product.suggestSearch'
		]);
Route::get('/{slugcat}/{slug}-{id}.html',[
	'uses'=>'smpshop\ProductController@detail',
	'as' => 'public.product.detail'	
	]);

Route::get('/about.html',[
	'uses'=>'smpshop\IndexController@about',
	'as' => 'public.index.about'	
	]);
Route::get('/contact.html',[
	'uses'=>'smpshop\IndexController@getContact',
	'as' => 'public.index.contact'	
	]);
Route::post('/contact.html',[
	'uses'=>'smpshop\IndexController@postContact',
	'as' => 'public.index.contact'	
	]);
Route::get('/search.html',[
	'uses'=>'smpshop\IndexController@search',
	'as' => 'public.index.search'	
	]);
Route::get('/profile.html',[
	'uses'=>'smpshop\IndexController@getProfile',
	'as' => 'public.index.profile'	
	]);
Route::post('/profile.html',[
	'uses'=>'smpshop\IndexController@postProfile',
	'as' => 'public.index.profile'	
	]);
Route::get('/cart.html',[
	'uses'=>'smpshop\CartController@index',
	'as' => 'public.order.cart'	
	]);
//CART
Route::resource('cart', 'smpshop\CartController',[
			'as'=>'public'
		]);
//END CART
//ORDER
Route::get('/order/step1.html',[
	'uses'=>'smpshop\OrderController@getStep1',
	'as' => 'public.order.step1'	
	]);
Route::post('/order/step1.html',[
	'uses'=>'smpshop\OrderController@postStep1',
	'as' => 'public.order.step1'	
	]);
Route::get('/order/step2.html',[
	'uses'=>'smpshop\OrderController@getStep2',
	'as' => 'public.order.step2'	
	]);
Route::resource('order', 'smpshop\OrderController',[
			'as'=>'public'
		]);
Route::get('/profile.html',[
	'uses'=>'smpshop\ProfileController@getProfile',
	'as' => 'public.profile.index'	
	]);
Route::post('/profile.html',[
	'uses'=>'smpshop\ProfileController@postProfile',
	'as' => 'public.profile.index'	
	]);
Route::get('/orderdetail-{id}.html',[
	'uses'=>'smpshop\ProfileController@show',
	'as' => 'public.profile.show'	
	]);
//END ORDER
Route::get('/{slugcat}',[
	'uses'=>'smpshop\ProductController@cat',
	'as' => 'public.product.cat'	
	]);

