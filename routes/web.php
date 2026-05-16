<?php

Auth::routes(['verify' => true]);

//--------------Backend Site Route.............................
Route::get('/dashboard','SuperAdminController@index');

Route::get('/logout','SuperAdminController@logout');

Route::get('/admin','AdminController@index'); 

Route::post('/admin-dashboard','AdminController@dashboard');

//------------------Delivery man route------------
Route::get('/add-man','SuperAdminController@view_deliver');

Route::get('/all-deliver','SuperAdminController@all_deliver');

Route::post('/save-deliver','SuperAdminController@save_deliver');

Route::get('/delete-delivery/{id}','SuperAdminController@delete_delivery');


//---------------Frontend Site Route........................
Route::get('/', 'FrontendController@index');

Route::get('/contact','FrontendController@contact_admin');

//--------------- Review route.................
Route::post('addReview','FrontendController@addreview');


//--------------- checkout and login route.......................
Route::get('/login-check','CheckoutController@login_check');

Route::get('/regi-check','CheckoutController@regi_check');

Route::get('/checkout-page','CheckoutController@CheckoutPage')->name('checkout.page');

Route::post('/save-shipping-details','CheckoutController@save_shipping_deatils');

//--------------- payment route.......................
Route::get('/payment','OrderController@payment');

Route::post('/order-place','OrderController@order_place');

//--------------- order route.......................
Route::get('/manage-order','OrderController@manage_order'); 

Route::get('/view-order/{order_id}','OrderController@view_order'); 

Route::get('/delete-order/{order_id}','OrderController@delete_order');

Route::get('/my-order','OrderController@my_order'); 

Route::get('/orderStatusUpdate','OrderController@orderStatusUpdate');

Route::get('/order-details/{order_id}','OrderController@order_details'); 

Route::get('/track-order/{order_id}','OrderController@track_order'); 


//----------------cuopons route-----------------
Route::get('/add-coupon','CouponController@index');

Route::post('/save-coupon','CouponController@save_coupon');

Route::get('/all-coupon','CouponController@all_coupon');

Route::get('/delete-coupon/{id}','CouponController@delete_coupon');

Route::get('/edit-coupon/{id}','CouponController@edit_coupon');

Route::post('/update-category/{id}','CouponController@update_coupon');

Route::post('/apply-coupon','CouponController@applyCoupon');



//--------------------Sell Product Route........................
Route::get('/sell-product','SellController@index')->name('sell.page');

Route::post('/save-sell','SellController@save_sell');

Route::get('/old-product','SellController@old_product');

Route::get('/view_old_product/{product_id}','SellController@old_product_details'); 

Route::get('/old-products','SellController@sell_products');

Route::get('/unactive-products/{product_id}','SellController@unactive_products');

Route::get('/active-products/{product_id}','SellController@active_products');

Route::get('/delete-products/{product_id}','SellController@delete_products');


//---------------Show category and brand wise product........................
Route::get('/product_by_category/{category_id}','HomeController@show_product_by_category'); 

Route::get('/product_by_brand/{brand_id}','HomeController@show_product_by_brand'); 

Route::get('/view_product/{product_id}','HomeController@product_deatils_by_id'); 

//---------------------Cart route.......................
Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show-cart','CartController@show_cart'); 
Route::get('/delete-to-cart/{rowId}','CartController@delete_cart'); 
Route::post('/update-cart','CartController@update_cart');


//---------------Category Route.............................
Route::get('/add-category','CategoryController@index');

Route::get('/all-category','CategoryController@all_category');

Route::post('/save-category','CategoryController@save_category');

Route::get('/edit-category/{category_id}','CategoryController@edit_category');

Route::post('/update-category/{category_id}','CategoryController@update_category');

Route::get('/delete-category/{category_id}','CategoryController@delete_category');

Route::get('/unactive-category/{category_id}','CategoryController@unactive_category');

Route::get('/active-category/{category_id}','CategoryController@active_category');


//--------------------Brand route...........
Route::get('/add-brand','BrandController@index');

Route::post('/save-brand','BrandController@save_brand');

Route::get('/all-brand','BrandController@all_brand');

Route::get('/delete-brand/{brand_id}','BrandController@delete_brand');

Route::get('/unactive-brand/{brand_id}','BrandController@unactive_brand');

Route::get('/active-brand/{brand_id}','BrandController@active_brand');

Route::get('/edit-brand/{brand_id}','BrandController@edit_brand');

Route::post('/update-brand/{brand_id}','BrandController@update_brand');


//--------------Product route
Route::get('/add-product','ProductController@index');

Route::post('/save-product','ProductController@save_product');

Route::get('/all-product','ProductController@all_product');

Route::get('/unactive-product/{product_id}','ProductController@unactive_product');

Route::get('/active-product/{product_id}','ProductController@active_product');

Route::get('/delete-product/{product_id}','ProductController@delete_product');


Route::get('/find-product','ProductController@FindProduct')->name('search.product');



//---------------Slider route
Route::get('/add-slider','SliderController@index');

Route::post('/save-slider','SliderController@save_slider');

Route::get('/all-slider','SliderController@all_slider');

Route::get('/unactive-slider/{slider_id}','SliderController@unactive_slider');

Route::get('/active-slider/{slider_id}','SliderController@active_slider');

Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');


//----------------------socialite
Route::get('login/github', 'Auth\LoginController@github');
Route::get('login/github/redirect', 'Auth\LoginController@githubRedirect');

  //--------------language route-------------
    Route::get('lang/{locale}',function ($locale){
    session()->put('locale',$locale);
    return redirect()->back();
    
});

