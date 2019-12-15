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

Route::get('/', function () {
    return view('welcome');
});

Route::post('dangki',['as'=>'postDangki','uses'=>'RegisterController@postDangki']);
Route::get('dangki',['as'=>'getDangki','uses'=>'RegisterController@getDangki']);
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::group(['prefix'=>'admin'],function(){
	Route::get('/',function(){return view('admin.master_admin');});
	Route::group(['prefix'=>'user'],function(){
		
		Route::get('/',['as'=>'admin.user.getList','uses'=>'UserController@getList']);
		Route::get('add',['as'=>'admin.user.add','uses'=>'UserController@getAdd']);
		Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.user.delete','uses'=>'UserController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.user.edit','uses'=>'UserController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
		Route::get('view/UserDetail/{id}',['as'=>'admin.user.view','uses'=>'UserController@viewUser']);
			
	});

	
	//List orders
	Route::group(['prefix'=>'orders'],function(){
		Route::get('/search',['as'=>'admin.order.search','uses'=>'OrderController@getSearch']);
		Route::get('/',['as'=>'admin.order.list','uses'=>'OrderController@getList']);
		Route::get('/shop',['as'=>'admin.order.shop','uses'=>'OrderController@getOrderShop']);
		Route::get('/tracking_order_list',['as'=>'admin.order.tracking_order_list','uses'=>'OrderController@trackingOrderList']);
		Route::get('/card',['as'=>'admin.order.card','uses'=>'OrderController@card']);
		Route::get('/{or_id}',['as'=>'admin.order.view','uses'=>'OrderController@getOrder']);
		Route::get('/add',['as'=>'admin.order.add','uses'=>'OrderController@getAdd']);
		Route::post('/add',['as'=>'admin.order.postAdd','uses'=>'OrderController@postAdd']);
		Route::get('/delete/{or_id}',['as'=>'admin.order.delete','uses'=>'OrderController@getDelete']);
		Route::get('/edit/{or_id}',['as'=>'admin.order.edit','uses'=>'OrderController@getEdit']);
		Route::post('/edit/{or_id}',['as'=>'admin.order.postEdit','uses'=>'OrderController@postEdit']);
	});

	//List Products
	Route::group(['prefix'=>'listProducts'],function(){
		Route::get('/',['as'=>'admin.product.getList','uses'=>'ProductController@getList']);
		Route::get('add',['as'=>'admin.product.add','uses'=>'ProductController@getAdd']);
		Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
		Route::get('delete/{pr_id}',['as'=>'admin.product.delete','uses'=>'ProductController@getDelete']);
		Route::get('edit/{pr_id}',['as'=>'admin.product.edit','uses'=>'ProductController@getEdit']);
		Route::post('edit/{pr_id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);		

	});
	
	//Tracking
	Route::group(['prefix'=>'tracking'],function(){
		Route::get('/',['as'=>'admin.tracking.getList','uses'=>'TrackingController@getList']);
		Route::get('add',['as'=>'admin.tracking.add','uses'=>'TrackingController@getAdd']);
		Route::post('add',['as'=>'admin.tracking.postAdd','uses'=>'TrackingController@postAdd']);
		Route::get('delete/{pr_id}',['as'=>'admin.tracking.delete','uses'=>'TrackingController@getDelete']);
		Route::get('edit/{pr_id}',['as'=>'admin.tracking.edit','uses'=>'TrackingController@getEdit']);
		Route::get('search',['as'=>'admin.tracking.search','uses'=>'TrackingController@search']);		
		Route::get('get_search',['as'=>'admin.tracking.get_search','uses'=>'TrackingController@get_search']);		
	});
	
	//economy
	Route::group(['prefix'=>'aconomy'],function(){
		Route::get('/',['as'=>'admin.aconomy.list','uses'=>'EconomyController@getList']);
		Route::get('thu_chi',['as'=>'admin.aconomy.thu_chi','uses'=>'EconomyController@thu_chi']);
		Route::get('don_hang',['as'=>'admin.aconomy.don_hang','uses'=>'EconomyController@don_hang']);
		Route::get('nap_tien',['as'=>'admin.aconomy.nap_tien','uses'=>'EconomyController@nap_tien']);
		Route::get('add',['as'=>'admin.aconomy.add','uses'=>'EconomyController@getAdd']);
		Route::post('add',['as'=>'admin.aconomy.postAdd','uses'=>'EconomyController@postAdd']);
		Route::get('delete/{eco_id}',['as'=>'admin.aconomy.delete','uses'=>'EconomyController@getDelete']);
		Route::get('edit/{eco_id}',['as'=>'admin.aconomy.edit','uses'=>'EconomyController@getEdit']);
		Route::post('edit/{eco_id}',['as'=>'admin.aconomy.postEdit','uses'=>'EconomyController@postEdit']);
		// Route::post('search',['as'=>'search','uses'=>'EconomyController@search']);
	});
});

// Route::group(['prefix'=>'admin','middleware' => ['can:admin']],function(){
	//-------------------------------------------User------------------------------------------


// Cart
Route::group(['prefix'=>'cart'],function(){
	Route::get('/',['as'=>'cart.listProduct','uses'=>'CartController@getList']);
});
