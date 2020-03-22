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


Route::get('/', 'FrontendController@index')->name('home');

//PRODUCT ROUTES
Route::get('/product/{id}', 'FrontendController@getSingleProduct')->name('product');
Route::get('/products', 'FrontendController@getAllProduct')->name('all.product');
Route::get('/category', 'FrontendController@getSingleProductCategory')->name('product.category');
Route::get('/all_category', 'FrontendController@getAllProductCategory')->name('all.product.category');

//ORDER ROUTES
Route::get('/delivery', 'UserController@getDelivery')->name('delivery');
Route::post('/fee', 'UserController@deliveryFee')->name('delivery.fee');
Route::get('/address', 'UserController@getAddress')->name('address');
Route::post('/address', 'UserController@updateAddress')->name('update.address');


//place order
Route::post('/summary', 'UserController@createOrder')->name('create.order');

//Get summary
Route::get('/summary', 'UserController@getSummary')->name('summary');


Auth::routes();

Route::post('/product/{id}', 'UserController@addProductItem')->name('add.product');


//ADMIN ROUTES

Route::get('admin/dashboard', 'HomeController@admin')->middleware('admin')->name('admin.index');

//Category
Route::get('admin/add_category', 'AdminController@getCategory')->middleware('admin')->name('form.category');
Route::post('admin/add_category', 'AdminController@addCategory')->name('add.category')->middleware('admin');
Route::get('/admin/delete_category/{id}', 'AdminController@deleteCategory')->name('category.delete');

//Category Type
Route::get('admin/add_category_type', 'AdminController@getCategoryType')->middleware('admin')->name('form.type');
Route::post('admin/add_category_type', 'AdminController@addCategoryType')->name('add.type')->middleware('admin');
Route::get('/admin/delete_category_type/{id}', 'AdminController@deleteCategoryType')->name('type.delete');

//Brand
Route::get('admin/add_brand', 'AdminController@getBrand')->middleware('admin')->name('form.brand');
Route::post('admin/add_brand', 'AdminController@addBrand')->name('add.brand')->middleware('admin');
Route::get('/admin/delete_brand/{id}', 'AdminController@deleteBrand')->name('brand.delete');

//Product
Route::get('admin/product/add', 'AdminController@getProduct')->middleware('admin')->name('form.product');
Route::post('admin/product/add', 'AdminController@addProduct')->name('add.product')->middleware('admin');
Route::get('/admin/product/delete/{id}', 'AdminController@deleteProduct')->name('product.delete');
Route::get('/admin/product/edit/{id}', 'AdminController@editProduct')->name('product.edit');
Route::get('/admin/product/page/{id}', 'AdminController@singleProduct')->name('product.single');
Route::get('admin/product/list', 'AdminController@getAllProduct')->middleware('admin')->name('list.product');

//Order
Route::get('admin/order/list', 'AdminController@getAllOrder')->middleware('admin')->name('list.order');
Route::get('/admin/order/delete/{id}', 'AdminController@deleteOrder')->name('order.delete');
Route::get('/admin/order/page/{id}', 'AdminController@singleOrder')->name('order.single');
Route::post('/admin/order/confirm', 'AdminController@confirmOrder')->name('order.confirm');
Route::post('/admin/order/sent', 'AdminController@sentOrder')->name('order.sent');
Route::post('/admin/order/init', 'AdminController@initOrder')->name('order.init');




//USER ROUTES

//User cart Item
Route::get('/cart', 'UserController@getCart');
Route::post('/cart', 'UserController@addCartItem')->name('add.cartitem');
Route::get('/cart/{id}', 'UserController@deleteCart')->name('cart.delete');

//User cart Item
Route::post('/cart/create', 'UserController@addCart')->name('add.cart');

//User Address
Route::get('/delivery', 'UserController@getDelivery')->name('delivery');
Route::post('/summary/place', 'UserController@placeOrder')->name('place.order');
Route::get('/confirm', 'UserController@confirmOrderUser')->name('confirm.user');


Route::get('/account', 'UserController@getAccount')->name('account');


