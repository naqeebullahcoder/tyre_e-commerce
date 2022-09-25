<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

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
Route::get('tyres/season/{season}', function ($season) {

    $products=Product::where('season',$season)->paginate(9);
    $width_data=Product::distinct('section')->select('section')->orderby('section','DESC')->get();
    $height_data=Product::distinct('profile')->select('profile')->orderby('profile','DESC')->get();
    $diameter_data=Product::distinct('rim')->select('rim')->orderby('rim','DESC')->get();
    $vehicle_type_data=Product::distinct('vehicle_type')->select('vehicle_type')->orderby('vehicle_type','ASC')->get();
    $brand_data=Product::distinct('brand')->select('brand')->orderby('rim','ASC')->get();
    $season_data=Product::distinct('season')->select('season')->orderby('season','ASC')->get();
    $load_index_data=Product::distinct('load_index')->select('load_index')->orderby('load_index','ASC')->get();
    $load_speed_data=Product::distinct('load_speed')->select('load_speed')->orderby('load_speed','ASC')->get();
    $size_data=Product::distinct('size')->select('size')->orderby('size','ASC')->get();
    $xl_data=Product::distinct('xl')->select('xl')->orderby('xl','ASC')->get();
    $brand_compass=Product::where('brand','Compass')->count();
    $brand_hifly=Product:: where('brand','Hifly')->count();
    $brand_nankang=Product::where('brand','Nankang')->count();
    $brand_powertrac=Product::where('brand','Powertrac')->count();
    $brand_avon=Product::where('brand','Avon')->count();
    $brand_grenlander=Product::where('brand','Grenlander')->count();
    $commercail_truck=Product::where('vehicle_type','Commercial Truck')->count();
    $commercail_van=Product::where('vehicle_type','Commercial Van')->count();
    $passenger_4x4=Product::where('vehicle_type','Passenger 4x4')->count();
    $passenger_car=Product::where('vehicle_type','Passenger Car')->count();
    $all_season=Product::where('season','All Season')->count();
    $summer=Product::where('season','Summer')->count();
    $winter=Product::where('season','Winter')->count();
    $size_r_18=Product::where('size','225/35R18')->count();
    $size_r_16=Product:: where('size','235/65R16')->count();
    $size_r_19=Product::where('size','225/55R19')->count();
    $size_r_22=Product::where('size','285/45R22')->count();
    $size_r_17=Product::where('size','235/50R17')->count();

    return view('frontend.pages.product-search')
        ->with('products',$products)
        ->with('width_data',$width_data)
        ->with('height_data',$height_data)
        ->with('diameter_data',$diameter_data)
        ->with('vehicle_type_data',$vehicle_type_data)
        ->with('brand_data',$brand_data)
        ->with('season_data',$season_data)
        ->with('load_index_data',$load_index_data)
        ->with('load_speed_data',$load_speed_data)
        ->with('size_data',$size_data)
        ->with('xl_data',$xl_data)
        ->with('brand_compass',$brand_compass)
        ->with('brand_hifly',$brand_hifly)
        ->with('brand_nankang',$brand_nankang)
        ->with('brand_powertrac',$brand_powertrac)
        ->with('brand_avon',$brand_avon)
        ->with('brand_grenlander',$brand_grenlander)
        ->with('commercail_truck',$commercail_truck)
        ->with('commercail_van',$commercail_van)
        ->with('passenger_4x4',$passenger_4x4)
        ->with('passenger_car',$passenger_car)
        ->with('all_season',$all_season)
        ->with('summer',$summer)
        ->with('winter',$winter)
        ->with('size_r_18',$size_r_18)
        ->with('size_r_16',$size_r_16)
        ->with('size_r_19',$size_r_19)
        ->with('size_r_22',$size_r_22)
        ->with('size_r_17',$size_r_17)
    ;
});

Route::get('tyres/type/{type}', function ($type) {
    $products=Product::where('vehicle_type',$type)->paginate(9);
    $width_data=Product::distinct('section')->select('section')->orderby('section','DESC')->get();
    $height_data=Product::distinct('profile')->select('profile')->orderby('profile','DESC')->get();
    $diameter_data=Product::distinct('rim')->select('rim')->orderby('rim','DESC')->get();
    $vehicle_type_data=Product::distinct('vehicle_type')->select('vehicle_type')->orderby('vehicle_type','ASC')->get();
    $brand_data=Product::distinct('brand')->select('brand')->orderby('rim','ASC')->get();
    $season_data=Product::distinct('season')->select('season')->orderby('season','ASC')->get();
    $load_index_data=Product::distinct('load_index')->select('load_index')->orderby('load_index','ASC')->get();
    $load_speed_data=Product::distinct('load_speed')->select('load_speed')->orderby('load_speed','ASC')->get();
    $size_data=Product::distinct('size')->select('size')->orderby('size','ASC')->get();
    $xl_data=Product::distinct('xl')->select('xl')->orderby('xl','ASC')->get();

    $brand_compass=Product::where('brand','Compass')->count();
    $brand_hifly=Product:: where('brand','Hifly')->count();
    $brand_nankang=Product::where('brand','Nankang')->count();
    $brand_powertrac=Product::where('brand','Powertrac')->count();
    $brand_avon=Product::where('brand','Avon')->count();
    $brand_grenlander=Product::where('brand','Grenlander')->count();
    $commercail_truck=Product::where('vehicle_type','Commercial Truck')->count();
    $commercail_van=Product::where('vehicle_type','Commercial Van')->count();
    $passenger_4x4=Product::where('vehicle_type','Passenger 4x4')->count();
    $passenger_car=Product::where('vehicle_type','Passenger Car')->count();
    $all_season=Product::where('season','All Season')->count();
    $summer=Product::where('season','Summer')->count();
    $winter=Product::where('season','Winter')->count();
    $size_r_18=Product::where('size','225/35R18')->count();
    $size_r_16=Product:: where('size','235/65R16')->count();
    $size_r_19=Product::where('size','225/55R19')->count();
    $size_r_22=Product::where('size','285/45R22')->count();
    $size_r_17=Product::where('size','235/50R17')->count();

    return view('frontend.pages.product-search')
        ->with('products',$products)
        ->with('width_data',$width_data)
        ->with('height_data',$height_data)
        ->with('diameter_data',$diameter_data)
        ->with('vehicle_type_data',$vehicle_type_data)
        ->with('brand_data',$brand_data)
        ->with('season_data',$season_data)
        ->with('load_index_data',$load_index_data)
        ->with('load_speed_data',$load_speed_data)
        ->with('size_data',$size_data)
        ->with('xl_data',$xl_data)
        ->with('brand_compass',$brand_compass)
        ->with('brand_hifly',$brand_hifly)
        ->with('brand_nankang',$brand_nankang)
        ->with('brand_powertrac',$brand_powertrac)
        ->with('brand_avon',$brand_avon)
        ->with('brand_grenlander',$brand_grenlander)
        ->with('commercail_truck',$commercail_truck)
        ->with('commercail_van',$commercail_van)
        ->with('passenger_4x4',$passenger_4x4)
        ->with('passenger_car',$passenger_car)
        ->with('all_season',$all_season)
        ->with('summer',$summer)
        ->with('winter',$winter)
        ->with('size_r_18',$size_r_18)
        ->with('size_r_16',$size_r_16)
        ->with('size_r_19',$size_r_19)
        ->with('size_r_22',$size_r_22)
        ->with('size_r_17',$size_r_17)
        ;
});


Route::get('/welcome',function(){

    $user_id=Request::cookie( 'laravel_session' );
    return view('welcome',compact('user_id'));
});


Route::get('/valitor','ValitorController@payment')->name('valitor');

Auth::routes(['register'=>false]);

Route::get('user/login','FrontendController@login')->name('login.form');
Route::post('user/login','FrontendController@loginSubmit')->name('login.submit');
Route::get('user/logout','FrontendController@logout')->name('user.logout');

Route::get('user/register','FrontendController@register')->name('register.form');
Route::post('user/register','FrontendController@registerSubmit')->name('register.submit');
// Reset password
Route::post('password-reset', 'FrontendController@showResetForm')->name('password.reset');
// Socialite
Route::get('login/{provider}/', 'Auth\LoginController@redirect')->name('login.redirect');
Route::get('login/{provider}/callback/', 'Auth\LoginController@Callback')->name('login.callback');

Route::get('/','FrontendController@home')->name('home');

// Frontend Routes

Route::get('/home', 'FrontendController@index');
Route::get('/about-us','FrontendController@aboutUs')->name('about-us');

Route::get('/fitting-station','FrontendController@fitting')->name('fitting-station');
Route::post('/fitting-station/store','FittingController@store')->name('fitting-station.store');


Route::get('/contact','FrontendController@contact')->name('contact');
Route::post('/contact','MessageController@store')->name('contact.store');


Route::get('/product-detail/{slug}','FrontendController@productDetail')->name('product-detail');

Route::any('/product-search','FrontendController@productSearch')->name('product-search');

Route::post('product-search/fetch', 'FrontendController@fetch')->name('product-search.fetch');

//Route::post('/product/search','FrontendController@productSearch')->name('product.search');
Route::get('/product-cat/{slug}','FrontendController@productCat')->name('product-cat');
Route::get('/product-sub-cat/{slug}/{sub_slug}','FrontendController@productSubCat')->name('product-sub-cat');
Route::get('/product-tyersbrand/{slug}','FrontendController@productBrand')->name('product-tyersbrand');
// Cart section
Route::get('/add-to-cart/{slug}','CartController@addToCart')->name('add-to-cart');
Route::post('/add-to-cart','CartController@singleAddToCart')->name('single-add-to-cart');
Route::get('cart-delete/{id}','CartController@cartDelete')->name('cart-delete');
Route::post('cart-update','CartController@cartUpdate')->name('cart.update');

Route::get('/cart',function(){
    return view('frontend.pages.cart');
})->name('cart');
Route::get('/checkout','CartController@checkout')->name('checkout');

Route::get('/wishlist',function() {
    return view('frontend.pages.wishlist');
})->name('wishlist');
Route::get('/wishlist/{slug}','WishlistController@wishlist')->name('add-to-wishlist')->middleware('user');
Route::get('wishlist-delete/{id}','WishlistController@wishlistDelete')->name('wishlist-delete');

Route::post('cart/order','OrderController@store')->name('cart.order');
Route::get('order/pdf/{id}','OrderController@pdf')->name('order.pdf');
Route::get('/income','OrderController@incomeChart')->name('product.order.income');
// Route::get('/user/chart','AdminController@userPieChart')->name('user.piechart');
Route::get('/product-grids','FrontendController@productGrids')->name('product-grids');
Route::get('/product-lists','FrontendController@productLists')->name('product-lists');
Route::match(['get','post'],'/filter','FrontendController@productFilter')->name('shop.filter');

Route::get('/product/track','OrderController@orderTrack')->name('order.track');
Route::post('product/track/order','OrderController@productTrackOrder')->name('product.track.order');


Route::get('/blog','FrontendController@blog')->name('blog');
Route::get('/blog-detail/{slug}','FrontendController@blogDetail')->name('blog.detail');
Route::get('/blog/search','FrontendController@blogSearch')->name('blog.search');
Route::post('/blog/filter','FrontendController@blogFilter')->name('blog.filter');
Route::get('blog-cat/{slug}','FrontendController@blogByCategory')->name('blog.category');
Route::get('blog-tag/{slug}','FrontendController@blogByTag')->name('blog.tag');


Route::post('/subscribe','FrontendController@subscribe')->name('subscribe');

Route::resource('/review','ProductReviewController');
Route::post('product/{slug}/review','ProductReviewController@store')->name('review.store');

Route::post('post/{slug}/comment','PostCommentController@store')->name('post-comment.store');
Route::resource('/comment','PostCommentController');

Route::post('/coupon-store','CouponController@couponStore')->name('coupon-store');

Route::get('payment', 'PaypalController@payment')->name('payment');
Route::get('payment', 'PaypalController@payment')->name('payment');
Route::get('cancel', 'PaypalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PaypalController@success')->name('payment.success');



// Backend section start

Route::group(['prefix'=>'/admin','middleware'=>['auth','admin']],function()
{
    Route::get('/','AdminController@index')->name('admin');
    Route::get('/file-manager',function(){
        return view('backend.layouts.file-manager');
    })->name('file-manager');
    // user route
    Route::resource('users','UsersController');
    // Banner
    Route::resource('banner','BannerController');
    // Brand
    Route::resource('brands','BrandController');
    // Profile
    Route::get('/profile','AdminController@profile')->name('admin-profile');
    Route::post('/profile/{id}','AdminController@profileUpdate')->name('profile-update');

    Route::resource('/category','CategoryController');

    Route::resource('/product','ProductController');

    Route::post('/category/{id}/child','CategoryController@getChildByParent');

    Route::resource('/post-category','PostCategoryController');

    Route::resource('/post-tag','PostTagController');
    Route::resource('/post','PostController');

    Route::resource('/fitting-station','FittingController');

    Route::resource('/profit-margin','ProfitMarginController');

//    Route::get('/fitting','FrontendController@fitting')->name('fitting');
    Route::post('/fitting-station/store','FittingController@store')->name('fitting');


    Route::resource('/message','MessageController');

    Route::get('/message/five','MessageController@messageFive')->name('messages.five');

    // Order
    Route::resource('/order','OrderController');
    // Shipping
    Route::resource('/shipping','ShippingController');
    // Coupon
    Route::resource('/coupon','CouponController');

    Route::get('settings','AdminController@settings')->name('settings');
    Route::post('setting/update','AdminController@settingsUpdate')->name('settings.update');

    Route::get('/notification/{id}','NotificationController@show')->name('admin.notification');
    Route::get('/notifications','NotificationController@index')->name('all.notification');
    Route::delete('/notification/{id}','NotificationController@delete')->name('notification.delete');
    // Password Change
    Route::get('change-password', 'AdminController@changePassword')->name('change.password.form');
    Route::post('change-password', 'AdminController@changPasswordStore')->name('change.password');
});


// User section start
Route::group(['prefix'=>'/user','middleware'=>['user']],function(){
    Route::get('/','HomeController@index')->name('user');

     Route::get('/profile','HomeController@profile')->name('user-profile');
     Route::post('/profile/{id}','HomeController@profileUpdate')->name('user-profile-update');
    //  Order
    Route::get('/order',"HomeController@orderIndex")->name('user.order.index');
    Route::get('/order/show/{id}',"HomeController@orderShow")->name('user.order.show');
    Route::delete('/order/delete/{id}','HomeController@userOrderDelete')->name('user.order.delete');
    // Product Review
    Route::get('/user-review','HomeController@productReviewIndex')->name('user.productreview.index');
    Route::delete('/user-review/delete/{id}','HomeController@productReviewDelete')->name('user.productreview.delete');
    Route::get('/user-review/edit/{id}','HomeController@productReviewEdit')->name('user.productreview.edit');
    Route::patch('/user-review/update/{id}','HomeController@productReviewUpdate')->name('user.productreview.update');

    // Post comment
    Route::get('user-post/comment','HomeController@userComment')->name('user.post-comment.index');
    Route::delete('user-post/comment/delete/{id}','HomeController@userCommentDelete')->name('user.post-comment.delete');
    Route::get('user-post/comment/edit/{id}','HomeController@userCommentEdit')->name('user.post-comment.edit');
    Route::patch('user-post/comment/udpate/{id}','HomeController@userCommentUpdate')->name('user.post-comment.update');

    Route::get('fitting-station',"HomeController@fittingIndex")->name('user.fitting-station.index');
    Route::delete('fitting-station/delete/{id}','HomeController@fittingDelete')->name('user.fitting-station.delete');
    Route::patch('fitting-station/update/{id}','HomeController@fittingUpdate')->name('user.fitting-station.update');
    Route::get('fitting-station/edit/{id}','HomeController@fittingEdit')->name('user.fitting-station.edit');

//    Route::get('/fitting','FrontendController@fitting')->name('fitting');
    Route::post('/fitting-station/store','FittingController@store')->name('fitting-station.store');

    // Password Change
    Route::get('change-password', 'HomeController@changePassword')->name('user.change.password.form');
    Route::post('change-password', 'HomeController@changPasswordStore')->name('change.password');

});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});