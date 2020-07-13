<?php

Auth::routes();
Route::get('/', 'FrontendController@index')->name('admin.frontend');
Route::get('/home', 'FrontendController@index')->name('admin.frontend');
Route::get('/lien-he', 'FrontendController@lien_he')->name('get.contact');



Route::group(['prefix' => 'backend', 'middleware' => ['auth','CheckLoginAdmin'], 'namespace'=>'Backend'],function(){
	Route::get('/', 'AdminController@index')->name('admin.home');

     // category
 Route::group(['prefix'=>'category'],function(){
   Route::get('/','AdminCategoryController@index')->middleware('CheckAcl:view-category')->name('admin.get.list.category');
   Route::get('/create','AdminCategoryController@create')->middleware('CheckAcl:create-category')->name('admin.get.create.category');
   Route::post('/create','AdminCategoryController@store')->name('admin.post.create.category');
   Route::get('/update/{id}','AdminCategoryController@edit')->middleware('CheckAcl:edit-category')->name('admin.get.edit.category');
   Route::post('/update/{id}','AdminCategoryController@update')->name('admin.post.update.category');
   Route::get('/{action}/{id}','AdminCategoryController@action')->name('admin.get.action.category');
 });



    //product
 Route::group(['prefix'=>'product'],function(){
  Route::get('/','AdminProductController@index')->middleware('CheckAcl:view-product')->name('admin.get.list.product');
  Route::get('/create','AdminProductController@create')->middleware('CheckAcl:create-product')->name('admin.get.create.product');
  Route::post('/create','AdminProductController@store')->name('admin.post.create.product');
  Route::get('/update/{id}','AdminProductController@edit')->middleware('CheckAcl:edit-product')->name('admin.get.edit.product');
  Route::post('/update/{id}','AdminProductController@update')->name('admin.post.update.product');
  Route::get('/{action}/{id}','AdminProductController@action')->middleware('CheckAcl:action-product')->name('admin.get.action.product');
     //    Route::get('/order','AdminProductController@index1')->name('admin.get.list.order');
});


    //order
 Route::group(['prefix'=>'order'],function(){

   Route::get('/OrderApprove','AdminOrderController@getOrderApprove')->middleware('CheckAcl:view-order')->name('admin.get.list.order');
   Route::get('/OrderDetail/{id}','AdminOrderController@showOrderDetail')->name('order.detail');
   Route::get('/OrderNotApprove','AdminOrderController@getOrderNotApprove')->middleware('CheckAcl:view-order')->name('admin.get.list.order.not');

// xử lý đơn hàng
   Route::get('/{action}/{id}','AdminOrderController@actionOrder')->middleware('CheckAcl:action-order')-> name('admin.get.active.order');
 });

    //report
    Route::group(['prefix'=>'report'],function(){
      Route::get('/bao-cao-theo-thang','AdminReportController@getReportMonth')->name('admin.get.list.month-report');
      Route::get('/bao-cao-theo-thang/search','AdminReportController@getReportMonthSearch')->name('admin.get.list.month-report-search');
      Route::get('/bao-cao-theo-ngay','AdminReportController@getReportDay')->name('admin.get.list.day-report');
      Route::get('/bao-cao-theo-ngay/search','AdminReportController@getReportDaySearch')->name('admin.get.list.day-report-search');
         //    Route::get('/order','AdminProductController@index1')->name('admin.get.list.order');
    });
    
// 
   // Route::get('/','AdminOrderController@getCart')->name('admin.get.cart');
   // Route::get('/cart', 'AdminOrderController@cart')->name('cart.index');
   // Route::get('/checkout', 'AdminOrderController@checkout')->name('check.get');
   // Route::post('/checkout', 'AdminOrderController@saveOrder')->name('check.post');
   // Route::post('/add', 'AdminOrderController@add')->name('cart.store');
   // Route::get('/update/{id}', 'AdminOrderController@getupdate')->name('cart.update.get');
   //   // Route::get('/update', 'AdminOrderController@update')->name('cart.update');
   // Route::post('/update', 'AdminOrderController@update')->name('cart.update');
   // Route::get('/reset/{id}', 'AdminOrderController@reset')->name('cart.reset');
   // Route::post('/remove', 'AdminOrderController@remove')->name('cart.remove'); 
   // Route::get('/{action}/{id}', 'AdminOrderController@action')->name('cart.delete');    
   // Route::get('/clear', 'AdminOrderController@clear')->name('cart.clear');


 // user phần BackEnd
 Route::group(['prefix' => 'user'], function() {
  Route::get('/list-user', 'AdminUserController@getCustomer')->middleware('CheckAcl:view-user')->name('get.backend.list.user');
    Route::get('/list-admin', 'AdminUserController@getListAdmin')->middleware('CheckAcl:view-user')->name('get.backend.list.admin');
});

 // phần quyền 
 Route::get('/list-Employee', 'RoleController@index')->middleware('CheckAcl:view-user')->name('get.backend.list.employee');
 Route::get('/role/createRole','RoleController@create')->middleware('CheckAcl:create-role')->name('create.role');
 Route::post('/role/createRole','RoleController@store')->name('store.role');
 Route::get('/role/{id}/edit/','RoleController@edit')->middleware('CheckAcl:edit-role')->name('edit.role');
 Route::post('/role/{id}/edit','RoleController@update')->name('update.role');
 Route::get('/role/destroy/{id}','RoleController@destroy')->middleware('CheckAcl:delete-role')->name('destroy.role');


// thông tin User và quyền admin user 
 Route::get('/show-user/{id}','AdminUserController@showEmployeeUser')->middleware('CheckAcl:view-user')->name('employee.show');
 Route::get('/create-user/create','AdminUserController@createEmployeeUser')->middleware('CheckAcl:create-user')->name('employee.user.create'); 
 Route::post('/create-user/create','AdminUserController@storeEmployeeUser'); 

 Route::get('/user/{id}/edit','AdminUserController@editEmployeeUser')->middleware('CheckAcl:edit-user')->name('employee.user.edit');
 Route::post('/user/{id}/edit','AdminUserController@updateEmployeeUser');

 Route::get('/user/delete/{id}','AdminUserController@destroy')->middleware('CheckAcl:delete-user')->name('delete.user');

});

// End BackEnd Admin

//auth

Route::group(['namespace'=>'Auth'],function(){
 Route::group(['prefix'=>'auth'],function(){
  Route::get('/admin','RegisterController@index')->name('get.home.login');
  Route::get('/register','RegisterController@create')->name('get.register');
  Route::post('/register','RegisterController@store')->name('post.register');


  Route::get('/login','LoginController@login')->name('admin.get.login');
  Route::post('/login','LoginController@postlogin')->name('admin.post.login');


  Route::get('/logout','LoginController@logout')->name('admin.logout');
  Route::get('/forgetpassword','ForgotPasswordController@getforgetpassword')->name('admin.get.forgetpassword');
  Route::post('/forgetpassword','ForgotPasswordController@postforgetpassword')->name('admin.post.forgetpassword');
          // Route::get('/resetpassword','ForgotPasswordController@getresetpassword')->name('admin.get.resetpassword');
  Route::post('/resetpassword','ForgotPasswordController@postresetpassword')->name('admin.post.resetpassword');
});
});


// end auth Admin

// Phần Đăng Ký  và Đăng Nhập frontend khách hàng
Route::get('/dang-nhap-user','UserController@getLogin')->name('get.user.login');
Route::post('/dang-nhap-user','UserController@postLogin');

Route::get('/dang-ky-user','UserController@getRegister')->name('get.user.register');
Route::post('/dang-ky-user','UserController@postRegister');

Route::get('/dang-xuat-user','UserController@getLogout')->name('get.user.logout');

// Phần sản phẩm và chi tiết sản phẩm
Route::get('/san-pham-type','ProductController@getProduct')->name('get.list.product');
Route::get('product-detail/{slug}-{id}','ProductController@getProductDetail')->name('get.product.detail');
Route::get('/san-pham-type/{name}','ProductController@getProductType')->name('get.list.product.type');
 // Phần Giỏ Hàng
Route::get('/cart-add/{id}', 'CartController@addProduct')->name('add.cart');
Route::get('/list-cart', 'CartController@listProduct')->name('list.cart');
Route::post('cart-update/{id}','CartController@updateProduct');
// thanh toán
Route::group(['prefix' => 'giohang', 'middleware' =>'CheckLogin'], function() {
  Route::get('/thanh-toan', 'CartController@getFormPay')->name('get.checkout');
  Route::post('/thanh-toan', 'CartController@saveInfoCart');
});

Route::get('/search', 'FrontendController@formSearch')->name('get.form.search');
Route::post('/comment-user/{id}', 'CommentController@saveComment')->name('get.user.comment');
Route::post('/reply/{id}', 'CommentController@replyComment')->name('post.reply.comment');  
Route::post('/danh-gia/{id}', 'CommentController@saveRating')->name('post.rating.product');
Route::get('/ajax-type','ProductController@getProduct')->name('get.ajax.product');
Route::get('/xac-nhan-order', 'CartController@verifyOrderReceive')->name('get.receive.user');

?>

