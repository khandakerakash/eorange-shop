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

Route::get('/new_cat', function() {
    return view('front.category');
});

Route::get('/cache-clear', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return "Config is cleared";
});

Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return "View is cleared";
});


Route::get('user/notf', function() {
    return View::make('user_notf');
});
Route::get('order/notf', function() {
    return View::make('order_notf');
});
Route::get('product/notf', function() {
    return View::make('product_notf');
});
Route::get('conv/notf', function() {
    return View::make('conv_notf');
});

Route::post('/json/comment','Json\JsonBlogController@comment');
Route::post('/json/comment/edit','Json\JsonBlogController@commentedit');
Route::get('/json/comment/delete','Json\JsonBlogController@commentdelete');

Route::post('/json/reply','Json\JsonBlogController@reply');
Route::post('/json/reply/edit','Json\JsonBlogController@replyedit');
Route::get('/json/reply/delete','Json\JsonBlogController@replydelete');

Route::post('/json/subreply','Json\JsonBlogController@subreply');
Route::post('/json/subreply/edit','Json\JsonBlogController@subreplyedit');
Route::get('/json/subreply/delete','Json\JsonBlogController@subreplydelete');

Route::get('/json/order/notf','Json\JsonRequestController@order_notf');
Route::get('/json/order/notf/clear','Json\JsonRequestController@order_notf_clear');
Route::get('/json/product/notf','Json\JsonRequestController@product_notf');
Route::get('/json/product/notf/clear','Json\JsonRequestController@product_notf_clear');
Route::get('/json/user/notf','Json\JsonRequestController@user_notf');
Route::get('/json/user/notf/clear','Json\JsonRequestController@user_notf_clear');
Route::get('/json/conv/notf','Json\JsonRequestController@conv_notf');
Route::get('/json/conv/notf/clear','Json\JsonRequestController@conv_notf_clear');

Route::get('/json/pos','Json\JsonRequestController@pos');
Route::get('/json/quick','Json\JsonRequestController@quick');
Route::get('/json/feature','Json\JsonRequestController@feature');
Route::get('/json/addbyone','Json\JsonRequestController@addbyone');
Route::get('/json/reducebyone','Json\JsonRequestController@reducebyone');
Route::get('/json/subcats','Json\JsonRequestController@subcats');
Route::get('/json/childcats','Json\JsonRequestController@childcats');
Route::get('/json/addcart','Json\JsonRequestController@addcart');
Route::get('/json/addnumcart','Json\JsonRequestController@addnumcart');
Route::get('/json/updatecart','Json\JsonRequestController@upcart');
Route::get('/json/upcolor','Json\JsonRequestController@upcolor');
Route::get('/json/removecart','Json\JsonRequestController@removecart');
Route::get('/json/coupon','Json\JsonRequestController@coupon');
Route::get('/json/wish','Json\JsonRequestController@wish');
Route::get('/json/removewish','Json\JsonRequestController@removewish');
Route::get('/json/favorite','Json\JsonRequestController@favorite');
Route::get('/json/removefavorite','Json\JsonRequestController@removefavorite');
Route::get('/json/suggest','Json\JsonRequestController@suggest');
Route::get('/json/trans','Json\JsonRequestController@trans');
Route::get('/json/transhow','Json\JsonRequestController@transhow');

Route::prefix('admin')->group(function() {

    Route::get('/dashboard', 'AdminController@index')->name('admin-dashboard');
    Route::get('/profile', 'AdminController@profile')->name('admin-profile');
    Route::post('/profile', 'AdminController@profileupdate')->name('admin-profile-update');
    Route::get('/reset-password', 'AdminController@passwordreset')->name('admin-password-reset');
    Route::post('/reset-password', 'AdminController@changepass')->name('admin-password-change');
    Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin-login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin-login-submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin-logout');
    Route::get('/video', 'GeneralSettingController@video')->name('admin-video');
    Route::post('/video', 'GeneralSettingController@videoup')->name('admin-video-submit');
    Route::get('/large-banner', 'PageSettingController@banner')->name('admin-lbanner');
    Route::post('/large-banner', 'PageSettingController@bannerup')->name('admin-lbanner-submit');

    Route::get('/orders', 'AdminOrderController@index')->name('admin-order-index');
    Route::get('/orders/pending', 'AdminOrderController@pending')->name('admin-order-pending');
    Route::get('/orders/processing', 'AdminOrderController@processing')->name('admin-order-processing');
    Route::get('/orders/completed', 'AdminOrderController@completed')->name('admin-order-completed');
    Route::get('/orders/declined', 'AdminOrderController@declined')->name('admin-order-declined');
    Route::get('/order/{id}/show', 'AdminOrderController@show')->name('admin-order-show');
    Route::get('/order/{id}/invoice', 'AdminOrderController@invoice')->name('admin-order-invoice');
    Route::get('/order/{id}/print', 'AdminOrderController@printpage')->name('admin-order-print');
    Route::get('/order/{id1}/status/{status}', 'AdminOrderController@status')->name('admin-order-status');
    Route::get('/order/email/{id}', 'AdminOrderController@email')->name('admin-order-email');
    Route::post('/order/email/', 'AdminOrderController@emailsub')->name('admin-order-emailsub');

    Route::get('/users', 'AdminUserController@index')->name('admin-user-index');
    Route::get('/users/delete/{id}', 'AdminUserController@destroy')->name('admin-user-delete');
    Route::get('/user/email/{id}', 'AdminUserController@email')->name('admin-user-email');
    Route::post('/user/email/', 'AdminUserController@emailsub')->name('admin-user-emailsub');
    Route::get('/user/{id}/show', 'AdminUserController@show')->name('admin-user-show');



    Route::get('/product', 'ProductController@index')->name('admin-prod-index');
    Route::get('/product-get-data', 'ProductController@getData')->name('admin-prod-get-data');
    Route::get('/product/deactive', 'ProductController@deactive')->name('admin-prod-deactive');
    Route::get('/product/create', 'ProductController@create')->name('admin-prod-create');
    Route::post('/product/create', 'ProductController@store')->name('admin-prod-store');
    Route::get('/product/edit/{id}', 'ProductController@edit')->name('admin-prod-edit');
    Route::post('/product/update/{id}', 'ProductController@update')->name('admin-prod-update');
    Route::post('/product/feature/{id}', 'ProductController@feature')->name('admin-prod-feature');
    Route::get('/product/delete/{id}', 'ProductController@destroy')->name('admin-prod-delete');
    Route::get('/product/status/{id1}/{id2}', 'ProductController@status')->name('admin-prod-st');

    Route::get('/category', 'CategoryController@index')->name('admin-cat-index');
    Route::get('/category/create', 'CategoryController@create')->name('admin-cat-create');
    Route::post('/category/create', 'CategoryController@store')->name('admin-cat-store');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('admin-cat-edit');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('admin-cat-update');
    Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('admin-cat-delete');
    Route::get('/category/status/{id1}/{id2}', 'CategoryController@status')->name('admin-cat-st');

    Route::get('/subcategory', 'SubcategoryController@index')->name('admin-subcat-index');
    Route::get('/subcategory/create', 'SubcategoryController@create')->name('admin-subcat-create');
    Route::post('/subcategory/create', 'SubcategoryController@store')->name('admin-subcat-store');
    Route::get('/subcategory/edit/{id}', 'SubcategoryController@edit')->name('admin-subcat-edit');
    Route::post('/subcategory/update/{id}', 'SubcategoryController@update')->name('admin-subcat-update');
    Route::get('/subcategory/delete/{id}', 'SubcategoryController@destroy')->name('admin-subcat-delete');
    Route::get('/subcategory/status/{id1}/{id2}', 'SubcategoryController@status')->name('admin-subcat-st');

    Route::get('/childcategory', 'ChildcategoryController@index')->name('admin-childcat-index');
    Route::get('/childcategory/create', 'ChildcategoryController@create')->name('admin-childcat-create');
    Route::post('/childcategory/create', 'ChildcategoryController@store')->name('admin-childcat-store');
    Route::get('/childcategory/edit/{id}', 'ChildcategoryController@edit')->name('admin-childcat-edit');
    Route::post('/childcategory/update/{id}', 'ChildcategoryController@update')->name('admin-childcat-update');
    Route::get('/childcategory/delete/{id}', 'ChildcategoryController@destroy')->name('admin-childcat-delete');
    Route::get('/childcategory/status/{id1}/{id2}', 'ChildcategoryController@status')->name('admin-childcat-st');

    Route::get('/coupon', 'AdminCouponController@index')->name('admin-cp-index');
    Route::get('/coupon/create', 'AdminCouponController@create')->name('admin-cp-create');
    Route::post('/coupon/create', 'AdminCouponController@store')->name('admin-cp-store');
    Route::get('/coupon/edit/{id}', 'AdminCouponController@edit')->name('admin-cp-edit');
    Route::post('/coupon/edit/{id}', 'AdminCouponController@update')->name('admin-cp-update');
    Route::get('/coupon/delete/{id}', 'AdminCouponController@destroy')->name('admin-cp-delete');
    Route::get('/coupon/status/{id1}/{id2}', 'AdminCouponController@status')->name('admin-cp-st');

    Route::get('/blog', 'AdminBlogController@index')->name('admin-blog-index');
    Route::get('/blog/create', 'AdminBlogController@create')->name('admin-blog-create');
    Route::post('/blog/create', 'AdminBlogController@store')->name('admin-blog-store');
    Route::get('/blog/edit/{id}', 'AdminBlogController@edit')->name('admin-blog-edit');
    Route::post('/blog/edit/{id}', 'AdminBlogController@update')->name('admin-blog-update');
    Route::get('/blog/delete/{id}', 'AdminBlogController@destroy')->name('admin-blog-delete');




    Route::get('/bottom-banners', 'ImageController@index')->name('admin-img1-index');
    Route::get('/bottom-banner/create', 'ImageController@create')->name('admin-img1-create');
    Route::post('/bottom-banner/create', 'ImageController@store')->name('admin-img1-store');
    Route::get('/bottom-banner/edit/{id}', 'ImageController@edit')->name('admin-img1-edit');
    Route::post('/bottom-banner/edit/{id}', 'ImageController@update')->name('admin-img1-update');
    Route::get('/bottom-banner/delete/{id}', 'ImageController@destroy')->name('admin-img1-delete');


    Route::get('/sm-banners', 'SmimageController@index')->name('admin-img2-index');
    Route::get('/sm-banner/create', 'SmimageController@create')->name('admin-img2-create');
    Route::post('/sm-banner/create', 'SmimageController@store')->name('admin-img2-store');
    Route::get('/sm-banner/edit/{id}', 'SmimageController@edit')->name('admin-img2-edit');
    Route::post('/sm-banner/edit/{id}', 'SmimageController@update')->name('admin-img2-update');
    Route::get('/sm-banner/delete/{id}', 'SmimageController@destroy')->name('admin-img2-delete');


    Route::get('/banner/top', 'BannerController@top')->name('admin-banner-top');
    Route::post('/banner/top', 'BannerController@topup')->name('admin-banner-topup');
    Route::get('/banner/bottom', 'BannerController@bottom')->name('admin-banner-bottom');
    Route::post('/banner/bottom', 'BannerController@bottomup')->name('admin-banner-bottomup');
    Route::get('/general-settings/countdown', 'GeneralSettingController@countdown')->name('admin-gs-countdown');
    Route::post('/general-settings/countdown', 'GeneralSettingController@countdownup')->name('admin-gs-countdownup');

    Route::group(['middleware'=>'admininistrator'],function(){

        Route::get('/vendors', 'AdminVendorController@index')->name('admin-vendor-index');
        Route::get('/vendors/pending', 'AdminVendorController@pending')->name('admin-vendor-pending');
        Route::get('/vendors/status/{id1}/{id2}', 'AdminVendorController@status')->name('admin-vendor-st');
        Route::get('/vendors/delete/{id}', 'AdminVendorController@destroy')->name('admin-vendor-delete');
        Route::get('/vendors/email/{id}', 'AdminVendorController@email')->name('admin-vendor-email');
        Route::post('/vendors/email/', 'AdminVendorController@emailsub')->name('admin-vendor-emailsub');
        Route::get('/vendors/{id}/show', 'AdminVendorController@show')->name('admin-vendor-show');
        Route::get('/vendors/withdraws', 'AdminVendorController@withdraws')->name('admin-vendor-wt');
        Route::get('/vendors/withdraws/pending', 'AdminVendorController@pendings')->name('admin-wt-pending');
        Route::get('/vendors/withdraw/details/{id}', 'AdminVendorController@withdrawdetails')->name('admin-vendor-wtd');
        Route::get('/vendors/withdraw/accept/{id}', 'AdminVendorController@accept')->name('admin-wt-accept');
        Route::get('/vendors/withdraw/reject/{id}', 'AdminVendorController@reject')->name('admin-wt-reject');
        Route::get('/users/withdraws', 'AdminVendorController@userwithdraws')->name('admin-vendor-wtt');
        Route::get('/users/withdraws/pending', 'AdminVendorController@userpendings')->name('admin-wtt-pending');
        Route::get('/users/withdraw/details/{id}', 'AdminVendorController@userwithdrawdetails')->name('admin-vendor-wttd');
        Route::get('/users/withdraw/accept/{id}', 'AdminVendorController@useraccept')->name('admin-wtt-accept');
        Route::get('/users/withdraw/reject/{id}', 'AdminVendorController@userreject')->name('admin-wtt-reject');


        Route::get('/faq', 'FaqController@index')->name('admin-fq-index');
        Route::get('/faq/create', 'FaqController@create')->name('admin-fq-create');
        Route::post('/faq/create', 'FaqController@store')->name('admin-fq-store');
        Route::get('/faq/edit/{id}', 'FaqController@edit')->name('admin-fq-edit');
        Route::post('/faq/update/{id}', 'FaqController@update')->name('admin-fq-update');
        Route::post('/faqup', 'PageSettingController@faqupdate')->name('admin-faq-update');
        Route::get('/faq/delete/{id}', 'FaqController@destroy')->name('admin-fq-delete');


        Route::get('/currency', 'AdminCurrencyController@index')->name('admin-currency-index');
        Route::get('/currency/create', 'AdminCurrencyController@create')->name('admin-currency-create');
        Route::post('/currency/create', 'AdminCurrencyController@store')->name('admin-currency-store');
        Route::get('/currency/edit/{id}', 'AdminCurrencyController@edit')->name('admin-currency-edit');
        Route::post('/currency/update/{id}', 'AdminCurrencyController@update')->name('admin-currency-update');
        Route::post('/currencyup', 'PageSettingController@currencyup')->name('admin-cur-update');
        Route::get('/currency/delete/{id}', 'AdminCurrencyController@destroy')->name('admin-currency-delete');
        Route::get('/currency/status/{id1}/{id2}', 'AdminCurrencyController@status')->name('admin-currency-st');

        Route::get('/page', 'PageController@index')->name('admin-page-index');
        Route::get('/page/create', 'PageController@create')->name('admin-page-create');
        Route::post('/page/create', 'PageController@store')->name('admin-page-store');
        Route::get('/page/edit/{id}', 'PageController@edit')->name('admin-page-edit');
        Route::post('/page/update/{id}', 'PageController@update')->name('admin-page-update');
        Route::get('/page/delete/{id}', 'PageController@destroy')->name('admin-page-delete');


        Route::get('/paymentgateway', 'PaymentGatewayController@index')->name('admin-payment-index');
        Route::get('/paymentgateway/create', 'PaymentGatewayController@create')->name('admin-payment-create');
        Route::post('/paymentgateway/create', 'PaymentGatewayController@store')->name('admin-payment-store');
        Route::get('/paymentgateway/edit/{id}', 'PaymentGatewayController@edit')->name('admin-payment-edit');
        Route::post('/paymentgateway/update/{id}', 'PaymentGatewayController@update')->name('admin-payment-update');
        Route::get('/paymentgateway/delete/{id}', 'PaymentGatewayController@destroy')->name('admin-payment-delete');
        Route::get('/paymentgateway/st/{id1}/{id2}', 'PaymentGatewayController@status')->name('admin-payment-st');

        Route::get('/testimonial', 'PortfolioController@index')->name('admin-ad-index');
        Route::get('/testimonial/create', 'PortfolioController@create')->name('admin-ad-create');
        Route::post('/testimonial/create', 'PortfolioController@store')->name('admin-ad-store');
        Route::get('/testimonial/edit/{id}', 'PortfolioController@edit')->name('admin-ad-edit');
        Route::post('/testimonial/edit/{id}', 'PortfolioController@update')->name('admin-ad-update');
        Route::get('/testimonial/delete/{id}', 'PortfolioController@destroy')->name('admin-ad-delete');

        Route::get('/services', 'AdminServiceController@index')->name('admin-service-index');
        Route::get('/services/create', 'AdminServiceController@create')->name('admin-service-create');
        Route::post('/services/create', 'AdminServiceController@store')->name('admin-service-store');
        Route::get('/services/edit/{id}', 'AdminServiceController@edit')->name('admin-service-edit');
        Route::post('/services/edit/{id}', 'AdminServiceController@update')->name('admin-service-update');
        Route::get('/services/delete/{id}', 'AdminServiceController@destroy')->name('admin-service-delete');

        Route::get('/slider', 'SliderController@index')->name('admin-sl-index');
        Route::get('/slider/create', 'SliderController@create')->name('admin-sl-create');
        Route::post('/slider/create', 'SliderController@store')->name('admin-sl-store');
        Route::get('/slider/edit/{id}', 'SliderController@edit')->name('admin-sl-edit');
        Route::post('/slider/edit/{id}', 'SliderController@update')->name('admin-sl-update');
        Route::get('/slider/delete/{id}', 'SliderController@destroy')->name('admin-sl-delete');

        Route::get('/brand', 'BrandController@index')->name('admin-img-index');
        Route::get('/brand/create', 'BrandController@create')->name('admin-img-create');
        Route::post('/brand/create', 'BrandController@store')->name('admin-img-store');
        Route::get('/brand/edit/{id}', 'BrandController@edit')->name('admin-img-edit');
        Route::post('/brand/edit/{id}', 'BrandController@update')->name('admin-img-update');
        Route::get('/brand/delete/{id}', 'BrandController@destroy')->name('admin-img-delete');

        Route::get('/pickup', 'PickupController@index')->name('admin-pick-index');
        Route::get('/pickup/create', 'PickupController@create')->name('admin-pick-create');
        Route::post('/pickup/create', 'PickupController@store')->name('admin-pick-store');
        Route::get('/pickup/edit/{id}', 'PickupController@edit')->name('admin-pick-edit');
        Route::post('/pickup/edit/{id}', 'PickupController@update')->name('admin-pick-update');
        Route::get('/pickup/delete/{id}', 'PickupController@destroy')->name('admin-pick-delete');

        Route::get('/page-settings/contact', 'PageSettingController@contact')->name('admin-ps-contact');
        Route::post('/page-settings/contact', 'PageSettingController@contactupdate')->name('admin-ps-contact-submit');

        Route::get('/staff', 'AdminStaffController@index')->name('admin-staff-index');
        Route::get('/staff/create', 'AdminStaffController@create')->name('admin-staff-create');
        Route::post('/staff/create', 'AdminStaffController@store')->name('admin-staff-store');
        Route::get('/staff/edit/{id}', 'AdminStaffController@show')->name('admin-staff-show');
        Route::get('/staff/delete/{id}', 'AdminStaffController@destroy')->name('admin-staff-delete');

        Route::get('/social', 'SocialSettingController@index')->name('admin-social-index');
        Route::post('/social/update', 'SocialSettingController@update')->name('admin-social-update');
        Route::get('/social/facebook', 'SocialSettingController@facebook')->name('admin-social-facebook');
        Route::post('/social/facebook', 'SocialSettingController@facebookupdate')->name('admin-social-ufacebook');
        Route::get('/social/google', 'SocialSettingController@google')->name('admin-social-google');
        Route::post('/social/google', 'SocialSettingController@googleupdate')->name('admin-social-ugoogle');

        Route::get('/seotools/analytics', 'SeoToolController@analytics')->name('admin-seotool-analytics');
        Route::post('/seotools/analytics/update', 'SeoToolController@analyticsupdate')->name('admin-seotool-analytics-update');
        Route::get('/seotools/keywords', 'SeoToolController@keywords')->name('admin-seotool-keywords');
        Route::post('/seotools/keywords/update', 'SeoToolController@keywordsupdate')->name('admin-seotool-keywords-update');

        Route::get('/general-settings/logo', 'GeneralSettingController@logo')->name('admin-gs-logo');
        Route::post('/general-settings/logo', 'GeneralSettingController@logoup')->name('admin-gs-logoup');

        Route::get('/general-settings/popup', 'GeneralSettingController@popup')->name('admin-gs-popup');
        Route::post('/general-settings/popup', 'GeneralSettingController@popupup')->name('admin-gs-popupup');

        Route::get('/general-settings/favicon', 'GeneralSettingController@fav')->name('admin-gs-fav');
        Route::post('/general-settings/favicon', 'GeneralSettingController@favup')->name('admin-gs-favup');

        Route::get('/general-settings/payments', 'GeneralSettingController@payments')->name('admin-gs-payments');
        Route::post('/general-settings/payments', 'GeneralSettingController@paymentsup')->name('admin-gs-paymentsup');
        Route::get('/general-settings/paypal/{status}', 'GeneralSettingController@paypal')->name('admin-gs-paypal');
        Route::get('/general-settings/stripe/{status}', 'GeneralSettingController@stripe')->name('admin-gs-stripe');
        Route::get('/general-settings/cod/{status}', 'GeneralSettingController@cod')->name('admin-gs-cod');

        Route::get('/general-settings/contents', 'GeneralSettingController@contents')->name('admin-gs-contents');
        Route::post('/general-settings/contents', 'GeneralSettingController@contentsup')->name('admin-gs-contentsup');

        Route::get('/general-settings/bgimg', 'GeneralSettingController@bgimg')->name('admin-gs-bgimg');
        Route::post('/general-settings/bgimgup', 'GeneralSettingController@bgimgup')->name('admin-gs-bgimgup');

        Route::get('/general-settings/cimg', 'GeneralSettingController@cimg')->name('admin-gs-cimg');
        Route::post('/general-settings/cimgup', 'GeneralSettingController@cimgup')->name('admin-gs-cimgup');

        Route::get('/general-settings/copyright', 'GeneralSettingController@about')->name('admin-gs-about');
        Route::post('/general-settings/copyright', 'GeneralSettingController@aboutup')->name('admin-gs-aboutup');

        Route::get('/general-settings/home-info', 'GeneralSettingController@bginfo')->name('admin-gs-bginfo');
        Route::post('/general-settings/home-info', 'GeneralSettingController@bginfoup')->name('admin-gs-bginfoup');

        Route::get('/general-settings/feature', 'GeneralSettingController@feature')->name('admin-gs-feature');
        Route::post('/general-settings/feature', 'GeneralSettingController@featureup')->name('admin-gs-featureup');

        Route::get('/general-settings/success', 'GeneralSettingController@successm')->name('admin-gs-successm');
        Route::post('/general-settings/success', 'GeneralSettingController@successmup')->name('admin-gs-successmup');

        Route::get('/subscribers', 'SubscriberController@index')->name('admin-subs-index');
        Route::get('/subscribers/download', 'SubscriberController@download')->name('admin-subs-download');

        Route::get('/languages', 'LanguageController@index')->name('admin-lang-index');
        Route::get('/languages/create', 'LanguageController@create')->name('admin-lang-create');
        Route::get('/languages/edit/{id}', 'LanguageController@edit')->name('admin-lang-edit');
        Route::post('/languages/create', 'LanguageController@store')->name('admin-lang-store');
        Route::post('/languages/edit/{id}', 'LanguageController@update')->name('admin-lang-update');
        Route::get('/languages/delete/{id}', 'LanguageController@destroy')->name('admin-lang-delete');
        Route::post('/langup', 'GeneralSettingController@lungup')->name('admin-lung-update');
        Route::get('/regvendor/{status}', 'GeneralSettingController@regvendor')->name('admin-gs-regvendor');
        Route::get('/rtl/{status}', 'GeneralSettingController@rtl')->name('admin-gs-rtl');
        Route::get('/vendor/registration', 'GeneralSettingController@reg')->name('admin-gs-reg');

        Route::get('/general-settings/loader', 'GeneralSettingController@load')->name('admin-gs-load');
        Route::post('/general-settings/loader', 'GeneralSettingController@loadup')->name('admin-gs-loadup');
    });
});


Route::prefix('user')->group(function() {
    Route::get('/dashboard', 'UserController@index')->name('user-dashboard');
    Route::get('/wishlist', 'UserController@wishlists')->name('user-wishlist');
    Route::get('/wishlists', 'UserController@wishlist')->name('user-wishlists');
    Route::get('/favorites', 'UserController@favorites')->name('user-favorites');
    Route::get('/wishlists/{sort}', 'UserController@wishlistsort')->name('user-wishlistsort');
    Route::get('/wishlist/product/{id}/delete', 'UserController@delete')->name('user-wish-delete');
    Route::get('/favorite/vendor/{id}/delete', 'UserController@favdelete')->name('user-favorite-delete');
    Route::get('/reset', 'UserController@resetform')->name('user-reset');
    Route::post('/reset', 'UserController@reset')->name('user-reset-submit');
    Route::get('/profile', 'UserController@profile')->name('user-profile');
    Route::post('/profile', 'UserController@profileupdate')->name('user-profile-update');
    Route::get('/forgot', 'Auth\UserForgotController@showforgotform')->name('user-forgot');
    Route::post('/forgot', 'Auth\UserForgotController@forgot')->name('user-forgot-submit');
    Route::get('/login', 'Auth\UserLoginController@showLoginForm')->name('user-login');
    Route::post('/login', 'Auth\UserLoginController@login')->name('user-login-submit');
    Route::get('/register', 'Auth\UserRegisterController@showRegisterForm')->name('user-register');
    Route::post('/register', 'Auth\UserRegisterController@register')->name('user-register-submit');
    Route::get('/logout', 'Auth\UserLoginController@logout')->name('user-logout');
    Route::post('/user/contact', 'UserController@usercontact');
    Route::get('/orders', 'UserController@orders')->name('user-orders');
    Route::get('/order/{id}', 'UserController@order')->name('user-order');
    Route::get('print/order/print/{id}', 'UserController@orderprint')->name('user-order-print');

    Route::get('/messages', 'UserController@messages')->name('user-messages');
    Route::get('/message/{id}', 'UserController@message')->name('user-message');
    Route::post('/message/post', 'UserController@postmessage')->name('user-message-post');
    Route::get('/message/{id}/delete', 'UserController@messagedelete')->name('user-message-delete');
    Route::prefix('vendor')->group(function() {

        Route::get('/vendor-request', 'UserController@vendorrequest')->name('user-vendor-request');
        Route::post('/vendor-request', 'UserController@vendorrequestsub')->name('user-vendor-request-submit');

        Route::get('/affilate/code', 'UserController@affilate_code')->name('user-affilate-code');

        Route::get('/affilate/withdraw', 'UserWithdrawController@index')->name('user-wwt-index');
        Route::get('/affilate/withdraw/create', 'UserWithdrawController@create')->name('user-wwt-create');
        Route::post('/affilate/withdraw/create', 'UserWithdrawController@store')->name('user-wwt-store');

        Route::group(['middleware'=>'vendor'],function(){

            Route::get('/product', 'UserProductController@index')->name('user-prod-index');
            Route::get('/product-get-data', 'UserProductController@getData')->name('user-prod-get-data');

            Route::get('/product/create', 'UserProductController@create')->name('user-prod-create');
            Route::post('/product/create', 'UserProductController@store')->name('user-prod-store');
            Route::get('/product/edit/{id}', 'UserProductController@edit')->name('user-prod-edit');
            Route::post('/product/update/{id}', 'UserProductController@update')->name('user-prod-update');
            Route::get('/product/delete/{id}', 'UserProductController@destroy')->name('user-prod-delete');
            Route::get('/product/status/{id1}/{id2}', 'UserProductController@status')->name('user-prod-st');

            Route::get('/slider', 'VendorSliderController@index')->name('user-sl-index');
            Route::get('/slider/create', 'VendorSliderController@create')->name('user-sl-create');
            Route::post('/slider/create', 'VendorSliderController@store')->name('user-sl-store');
            Route::get('/slider/edit/{id}', 'VendorSliderController@edit')->name('user-sl-edit');
            Route::post('/slider/edit/{id}', 'VendorSliderController@update')->name('user-sl-update');
            Route::get('/slider/delete/{id}', 'VendorSliderController@destroy')->name('user-sl-delete');

            Route::get('/shop/', 'UserController@shop')->name('user-shop-desc');
            Route::post('/shop/', 'UserController@shopup')->name('user-shop-descup');

            Route::get('/social', 'UserController@social')->name('user-social-index');
            Route::post('/social/update', 'UserController@socialupdate')->name('user-social-update');


            Route::get('/orders', 'UserController@vendororders')->name('vendor-order-index');
            Route::get('/order/{slug}/show', 'UserController@vendororder')->name('vendor-order-show');
            Route::get('/order/{slug}/invoice', 'UserController@invoice')->name('vendor-order-invoice');
            Route::get('/order/{slug}/print', 'UserController@printpage')->name('vendor-order-print');
            Route::get('/order/{slug}/status/{status}', 'UserController@status')->name('vendor-order-status');
            Route::get('/order/email/{email}', 'UserController@email')->name('vendor-order-email');
            Route::post('/order/email/', 'UserController@emailsub')->name('vendor-order-emailsub');

            Route::get('/shipping-cost/', 'UserController@ship')->name('user-shop-ship');
            Route::post('/shipping-cost/', 'UserController@shipup')->name('user-shop-shipup');

            Route::get('/withdraw', 'VendorWithdrawController@index')->name('user-wt-index');
            Route::get('/withdraw/create', 'VendorWithdrawController@create')->name('user-wt-create');
            Route::post('/withdraw/create', 'VendorWithdrawController@store')->name('user-wt-store');

        });

    });


    Route::post('/payment', 'PaymentController@store')->name('payment.submit');
    Route::get('/payment/cancle', 'PaymentController@paycancle')->name('payment.cancle');
    Route::get('/payment/return', 'PaymentController@payreturn')->name('payment.return');


    // for members

    Route::get('/members', 'MemberController@index');
    Route::get('/members/create', 'MemberController@create')->name('members_create');
    Route::post('/members/store', ['as' => 'members_store', 'uses' => 'MemberController@store']);
    Route::get('/members/view/{id}', 'MemberController@show');
    Route::get('/members/edit/{id}', 'MemberController@edit');
    Route::post('/members/update/{id}', ['as' => 'members_update', 'uses' => 'MemberController@update']);
    Route::delete('/members/delete/{id}', ['as' => 'members_delete', 'uses' => 'MemberController@destroy']);




});


Route::get('admin/check/movescript', 'AdminController@movescript')->name('admin-move-script');
Route::get('admin/generate/backup', 'AdminController@generate_bkup')->name('admin-generate-backup');
Route::get('admin/activation', 'AdminController@activation')->name('admin-activation-form');
Route::post('admin/activation', 'AdminController@activation_submit')->name('admin-activate-purchase');
Route::get('admin/clear/backup', 'AdminController@clear_bkup')->name('admin-clear-backup');

Route::post('the/genius/ocean/2441139', 'FrontendController@subscription');
Route::get('finalize', 'FrontendController@finalize');




Route::get('/','FrontendController@index')->name('front.index');
Route::get('json/load-more','FrontendController@load_more_data')->name('loadmore.load_data');
Route::get('/flash','FrontendController@flashSale')->name('front.flash');
Route::get('/eorangemall','FrontendController@eorangeMall')->name('front.eorangemall');
Route::get('/orangebasket','FrontendController@orangeBasket')->name('front.orangebasket');
Route::get('/surpriseoffer','FrontendController@surpriseoffer')->name('front.surpriseoffer');

Route::get('/category/{slug}','Front\IndividualController@category')->name('front.category');
Route::get('/premium/{slug}','Front\IndividualController@spatialCategory')->name('front.spatial_category');
Route::get('/new-arrivals','Front\IndividualController@newArrivals')->name('front.new_arrivals');
Route::get('/999markets','Front\IndividualController@_999markets')->name('front.999markets');
Route::get('/vendor/{slug}','Front\IndividualController@vendor')->name('front.vendor');

Route::get('/search','Front\IndividualController@search')->name('front.search');
Route::get('get-search-product','Front\IndividualController@getSearchProduct')->name('front.get-search_product');


Route::get('/get-products/{category_id}','Front\IndividualController@getProducts')->name('front.get_products');



Route::get('/lang/{id}','FrontendController@lang')->name('front.lang');
Route::get('/currency/{id}','FrontendController@currency')->name('front.curr');
Route::get('/faq','FrontendController@faq')->name('front.faq');
Route::get('/contact','FrontendController@contact')->name('front.contact');

// Footer Static Nav page route
Route::get('/helpandsupport','FrontendController@helpandsupport')->name('front.helpandsupport');
Route::get('/privacy_policy','FrontendController@privacyPolicy')->name('front.privacy_policy');
Route::get('/terms_or_condition','FrontendController@termsOrCondition')->name('front.terms_or_condition');
Route::get('/gettoknowus','FrontendController@gettoknowus')->name('front.gettoknowus');
Route::get('/return_policy','FrontendController@returnPolicy')->name('front.return_policy');
Route::get('/emi_policy','FrontendController@emiPolicy')->name('front.emi_policy');

//    Route::get('/category/{slug}','FrontendController@category')->name('front.category');
//    Route::get('/category/{slug}',function (){
//        return view('front.category2');
//    })->name('front.category');
Route::get('/category/{slug}/{sort}','FrontendController@categorysort');
//    Route::get('/subcategory/{slug}','FrontendController@subcategory')->name('front.subcategory');
Route::get('/subcategory/{slug}',function (){
    return view('front.category2');
})->name('front.subcategory');
Route::get('/subcategory/{slug}/{sort}','FrontendController@subcategorysort');
//    Route::get('/childcategory/{slug}','FrontendController@childcategory')->name('front.childcategory');
Route::get('/childcategory/{slug}',function (){
    return view('front.category2');
})->name('front.childcategory');
Route::get('/childcategory/{slug}/{sort}','FrontendController@childcategorysort');
Route::get('/product/{id}/{slug}','FrontendController@product')->name('front.product');
Route::post('/product/review','FrontendController@reviewsubmit')->name('front.review.submit');
Route::get('/cart','FrontendController@cart')->name('front.cart');
Route::get('/checkout','FrontendController@checkout')->name('front.checkout')->middleware('auth:user');
Route::get('/payment/{order_number}','FrontendController@payment')->name('front.payment')->middleware('auth:user');

Route::post('/order/{order_number}/order-note','FrontendController@orderNote')->name('front.order_note')->middleware('auth:user');
Route::post('/order/{order_number}/order-cancel','FrontendController@orderCancel')->name('front.order_cancel')->middleware('auth:user');

/**
 * sslcommerze
 */
Route::get('sslcz-gw/process','SSLPayment\SSLPaymentController@process')->name('sslcz_gw.process');
Route::post('sslcz-gw/success','SSLPayment\SSLPaymentController@success')->name('sslcz_gw.success');
Route::post('sslcz-gw/fail','SSLPayment\SSLPaymentController@fail')->name('sslcz_gw.fail');
Route::post('sslcz-gw/cancel','SSLPayment\SSLPaymentController@cancel')->name('sslcz_gw.cancel');
Route::post('sslcz-gw/pay','SSLPayment\SSLPaymentController@index')->name('sslcz_gw.pay');


Route::get('/tags/{tag}','FrontendController@tags')->name('front.tags');

Route::get('/search/{search}','FrontendController@searchs')->name('front.searchs');
Route::get('/search/{search}/{sort}','FrontendController@searchss')->name('front.searchss');
Route::get('/blog','FrontendController@blog')->name('front.blog');
Route::get('/blog/{id}','FrontendController@blogshow')->name('front.blogshow');
Route::post('/contact','FrontendController@contactemail')->name('front.contact.submit');
Route::post('/subscribe','FrontendController@subscribe')->name('front.subscribe.submit');
Route::post('/vendor/contact','FrontendController@vendorcontact')->name('front.vendor.contact');

Route::post('/payment', 'PaymentController@store')->name('payment.submit');
Route::get('/payment/cancle', 'PaymentController@paycancle')->name('payment.cancle');
Route::get('/payment/return', 'PaymentController@payreturn')->name('payment.return');
Route::post('/payment/notify', 'PaymentController@notify')->name('payment.notify');

Route::post('/stripe-submit', 'StripeController@store')->name('stripe.submit');
Route::post('/cashondelivery', 'FrontendController@cashondelivery')->name('cash.submit');
Route::post('/mobile_money', 'FrontendController@mobilemoney')->name('mobile.submit');
Route::post('/bank_wire', 'FrontendController@bankwire')->name('bank.submit');
Route::post('/gateway', 'FrontendController@gateway')->name('gateway.submit');
Route::get('/contact/refresh_code','FrontendController@refresh_code');
Route::post('/vendor/registration', 'FrontendController@vendor_register')->name('vendor.registration');




Route::get('auth/{provider}', 'Auth\SocialRegisterController@redirectToProvider')->name('social-provider');
Route::get('auth/{provider}/callback', 'Auth\SocialRegisterController@handleProviderCallback');



Route::get('/{slug}','FrontendController@page')->name('front.page');


Route::get('test2/{cat}/{slug}',function (){
    return view('front.category2');
});





