<?php

use Illuminate\Support\Facades\Route;

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


Route::group(['namespace' => 'Frontend'], function (){
    Route::get('/', 'HomeController@index');
    Route::get('root/category/{id}/{slug}', 'ProductController@root_category_product')->name('root.category.product');
    Route::get('sub-category/{id}/{slug}', 'ProductController@sub_category_product')->name('sub.category.product');
    Route::get('/product/{id}/{slug}', 'ProductController@single_product')->name('single.product');
    Route::post('/get/product/price', 'ProductController@get_product_price')->name('get.product.price');

    //--Search Product----
    Route::get('/search}', 'ProductController@search')->name('search.product');

    //-------Cart Route Are Here------
    Route::post('/add-to/cart', 'CartController@add_to_cart')->name('add.cart');
    Route::get('/show-cart', 'CartController@show_cart')->name('show.cart');
    Route::post('/update-quantity', 'CartController@update_quantity')->name('update.quantity');
    Route::get('/destroy-cart-item/{rowId}', 'CartController@destroy_cart_item')->name('destroy.cart.item');

    //----Apply Coupon----
    Route::post('/apply-coupon', 'CartController@apply_coupon')->name('apply.coupon');

    //----Subscriber-------
    Route::post('/subscriber', 'SubscriberController@store')->name('subscriber');
    Route::get('/check-subscriber', 'SubscriberController@check_subscriber')->name('check.subscriber');

    //Login & Register Page
    Route::get('/login-register', 'UserController@loginRegister')->name('login.register');
    Route::post('user/register', 'UserController@register')->name('user.register');
    Route::get('check-email', 'UserController@check_email')->name('check.email');
    Route::get('/confirm-email/{token}', 'UserController@confirm_email')->name('confirm.email');
    Route::post('user/login', 'UserController@login')->name('user.login');
    //---forget password
    Route::match(['get', 'post'], '/forget-password', 'UserController@forget_password')->name('forget.password');
    Route::get('/reset-password/{token?}', 'UserController@reset_password')->name('reset.password');
    Route::post('/reset-password/{token?}', 'UserController@reset_password_update')->name('reset.password.update');

    Route::group(['middleware' => 'auth'], function (){
        Route::post('user/logout', 'UserController@logout')->name('user.logout');
        //User Account
        Route::get( '/account', 'AccountController@account')->name('user.account');
        Route::get( '/account/edit/profile', 'AccountController@edit_profile')->name('user.edit.profile');
        Route::post( '/update/profile', 'AccountController@update_profile')->name('user.update.profile');
        Route::get('/change/password', 'AccountController@change_password')->name('change.password');
        Route::get('/check/current/password', 'AccountController@check_current_password')->name('check.current.password');
        Route::post('/update/password', 'AccountController@update_password')->name('update.password');

        //-------checkout-------
        Route::match(['get', 'post'], '/checkout', 'CheckoutController@checkout')->name('checkout');
        //---add delivery address
        Route::get('/add/delivery-address', 'CheckoutController@add_delivery_address')->name('add.delivery.address');
        Route::post('/store/delivery-address', 'CheckoutController@store_delivery_address')->name('store.delivery.address');
        Route::get('/edit/delivery-address/{id}', 'CheckoutController@edit_delivery_address')->name('edit.delivery.address');
        Route::post('/update/delivery-address/{id}', 'CheckoutController@update_delivery_address')->name('update.delivery.address');
        Route::get('/delete/delivery-address/{id}', 'CheckoutController@delete_delivery_address')->name('delete.delivery.address');
        //----Thanks Page----
        Route::get('/thanks', 'CheckoutController@thanks')->name('thanks');

        //-------Order Route----
        Route::get('/order','OrderController@order')->name('order');
        Route::get('/order/details/{id}','OrderController@order_details')->name('order.details');

        //-----Stript--------
        Route::get('/stripe', 'StripeController@index');
        Route::post('/stripe/payment', 'StripeController@payment')->name('stripe.payment');
    });

    Route::group(['middleware' => 'sslcommerz'], function (){
        Route::post('/success', 'SslCommerzController@success');
        Route::post('/fail', 'SslCommerzController@fail');
        Route::post('/cancel', 'SslCommerzController@cancel');
        Route::post('/ipn', 'SslCommerzController@ipn');
    });


});







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//----------------------Admin Panel-------------------
Route::match(['get', 'post'], '/admin', 'Backend\AdminController@login')->name('admin');

Route::group(['prefix'=>'admin', 'as'=>'admin.', 'namespace' => 'Backend', 'middleware' => 'admin'], function (){
    Route::post('logout', 'AdminController@logout')->name('logout');
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');

    //----------Category Routes Are Here---------
    Route::group(['prefix'=>'categories'], function (){
        Route::get('/view', 'CategoryController@show')->name('view.category');
        Route::get('/add', 'CategoryController@add')->name('add.category');
        Route::post('/store', 'CategoryController@store')->name('store.category');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('edit.category');
        Route::post('/update/{id}', 'CategoryController@update')->name('update.category');
        Route::post('/destroy/{id}', 'CategoryController@destroy')->name('destroy.category');
        Route::post('/status', 'CategoryController@status')->name('status.category');
    });

    Route::group(['prefix'=>'subcategories'], function (){
        Route::get('/view', 'SubCategoryController@show')->name('view.subcategory');
        Route::get('/add', 'SubCategoryController@add')->name('add.subcategory');
        Route::post('/store', 'SubCategoryController@store')->name('store.subcategory');
        Route::get('/edit/{id}', 'SubCategoryController@edit')->name('edit.subcategory');
        Route::post('/update/{id}', 'SubCategoryController@update')->name('update.subcategory');
        Route::post('/destroy/{id}', 'SubCategoryController@destroy')->name('destroy.subcategory');
        Route::post('/status', 'SubCategoryController@status')->name('status.subcategory');
    });

    Route::group(['prefix'=>'sub-subcategories'], function (){
        Route::get('/view', 'Sub_SubCategoryController@show')->name('view.sub_subcategory');
        Route::get('/add', 'Sub_SubCategoryController@add')->name('add.sub_subcategory');
        Route::post('/store', 'Sub_SubCategoryController@store')->name('store.sub_subcategory');
        Route::get('/edit/{id}', 'Sub_SubCategoryController@edit')->name('edit.sub_subcategory');
        Route::post('/update/{id}', 'Sub_SubCategoryController@update')->name('update.sub_subcategory');
        Route::post('/destroy/{id}', 'Sub_SubCategoryController@destroy')->name('destroy.sub_subcategory');
        Route::post('/status', 'Sub_SubCategoryController@status')->name('status.sub_subcategory');
    });

    //---------Brand Routes---
    Route::group(['prefix'=>'brands'], function (){
        Route::get('/view', 'BrandController@show')->name('view.brand');
        Route::get('/add', 'BrandController@add')->name('add.brand');
        Route::post('/store', 'BrandController@store')->name('store.brand');
        Route::get('/edit/{id}', 'BrandController@edit')->name('edit.brand');
        Route::post('/update/{id}', 'BrandController@update')->name('update.brand');
        Route::post('/destroy/{id}', 'BrandController@destroy')->name('destroy.brand');
        Route::post('/status', 'BrandController@status')->name('status.brand');
    });

    //---------Product Routes---
    Route::group(['prefix'=>'products'], function (){
        Route::get('/view', 'ProductController@show')->name('view.product');
        Route::get('/add', 'ProductController@add')->name('add.product');
        //-------Get SubCategory----------
        Route::get('/get-subcategory', 'ProductController@get_subcategory')->name('get_subcategory.product');
        Route::get('/get-sub-subcategory', 'ProductController@get_sub_subcategory')->name('get_sub_subcategory.product');

        Route::post('/store', 'ProductController@store')->name('store.product');
        Route::get('/edit/{id}', 'ProductController@edit')->name('edit.product');
        Route::post('/update/{id}', 'ProductController@update')->name('update.product');
        Route::post('/destroy/{id}', 'ProductController@destroy')->name('destroy.product');
        Route::post('/status', 'ProductController@status')->name('status.product');

        //------Product Attributes--------
        Route::get('/add/attributes/{id}', 'ProductAttributeController@add')->name('product.add.attributes');
        Route::post('/store/attributes/{id}', 'ProductAttributeController@store')->name('product.store.attributes');
        Route::post('/update/attributes/{id}', 'ProductAttributeController@update')->name('product.update.attributes');
        Route::get('/destroy/attributes/{id}', 'ProductAttributeController@destroy')->name('product.destroy.attributes');
        Route::post('/attributes/status', 'ProductAttributeController@status')->name('product.status.attributes');

        //------Product Image--------
        Route::get('/add/image/{id}', 'ProductAttributeController@add_image')->name('product.add.image');
        Route::post('/store/image/{id}', 'ProductAttributeController@store_image')->name('product.store.image');
        Route::get('/destroy/image/{id}', 'ProductAttributeController@destroy_image')->name('product.destroy.image');
        Route::post('/image/status', 'ProductAttributeController@status_image')->name('product.status.image');
    });

    //---------Coupon Routes---
    Route::group(['prefix'=>'coupon'], function (){
        Route::get('/view', 'CouponController@show')->name('view.coupon');
        Route::get('/add', 'CouponController@add')->name('add.coupon');
        Route::post('/store', 'CouponController@store')->name('store.coupon');
        Route::get('/edit/{id}', 'CouponController@edit')->name('edit.coupon');
        Route::post('/update/{id}', 'CouponController@update')->name('update.coupon');
        Route::post('/destroy/{id}', 'CouponController@destroy')->name('destroy.coupon');
        Route::post('/status', 'CouponController@status')->name('status.coupon');
    });


    //------Shipping Routes-----
    Route::group(['prefix'=>'shipping'], function (){
        Route::get('/view', 'ShippingController@show')->name('view.shipping');
        Route::get('/edit/{id}', 'ShippingController@edit')->name('edit.shipping');
        Route::post('/update/{id}', 'ShippingController@update')->name('update.shipping');
        Route::get('/status', 'ShippingController@status')->name('shipping.status');
    });

    //---------Order Routes---
    Route::group(['prefix'=>'order'], function (){
        Route::get('/view', 'OrderController@order')->name('order');
        Route::get('/details/{id}', 'OrderController@order_details')->name('order.details');
        Route::post('/update/status/{id}', 'OrderController@update_status')->name('update.order.status');
        Route::get('/invoice/{id}', 'OrderController@order_invoice')->name('order.invoice');
    });

    //---------Subscriber Routes---
    Route::group(['prefix'=>'subscriber'], function (){
        Route::get('/view', 'SubscriberController@subscriber')->name('subscriber');
        Route::post('/status', 'SubscriberController@status')->name('subscriber.status');
        Route::post('/destroy/{id}', 'SubscriberController@destroy')->name('subscriber.destroy');
    });
});


