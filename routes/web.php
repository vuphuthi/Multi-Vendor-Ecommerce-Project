<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CompareController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Middleware\RedirectIfAuthenticated;

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

Route::get('/',[IndexController::class,'Index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function() {

Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/logout', [UserController::class, 'UserDestroy'])->name('user.logout');
Route::post('/user/update/password',[UserController::class,'UserUpdatePassword'])->name('user.update.password');

}); // Gorup Milldeware End
// Admin DashBoard
require __DIR__.'/auth.php';
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password',[AdminController::class,'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password',[AdminController::class,'AdminUpdatePassword'])->name('admin.update.password');

});

// Vendor DashBoard
Route::middleware(['auth','role:vendor'])->group(function(){
    Route::get('/vendor/dashboard',[VendorController::class,'VendorDashboard'])->name('vendor.dashboard');
    Route::get('/vendor/logout',[VendorController::class,'VendorDestroy'])->name('vendor.logout');
    Route::get('/vendor/profile',[VendorController::class,'VendorProfile'])->name('vendor.profile');
    Route::post('/vendor/profile/store',[VendorController::class,'VendorProfileStore'])->name('vendor.profile.store');
    Route::get('/vendor/change/password',[VendorController::class,'VendorChangePassword'])->name('vendor.change.password');
    Route::post('/vendor/update/password',[VendorController::class,'VendorUpdatePassword'])->name('vendor.update.password');
    // vendor.profile

    // vendor.product
    route::controller(VendorProductController::class)->group(function(){
        Route::get('/vendor/all/product','VendorAllProduct')->name('vendor.all.product');
        Route::get('/vendor/add/product','VendorAddProduct')->name('vendor.add.product');
        Route::get('/vendor/subcategory/ajax/{category_id}' , 'VendorGetSubCategory');
        Route::post('/vendor/store/product','VendorStoreProduct')->name('vendor.store.product');
        Route::get('/vendor/edit/product/{id}','VendorEditProduct')->name('vendor.edit.product');
        Route::post('/vendor/update/product','VendorUpdateProduct')->name('vendor.update.product');
        Route::post('/vendor/update/product/thambnail','VendorUpdateProductThambnail')->name('vendor.update.product.thambnail');
        Route::post('/vendor/update/product/multiimage' , 'VendorUpdateProductMultiimage')->name('vendor.update.product.multiimage');
        Route::get('/vendor/product/multiimg/delete/{id}' , 'VendorMulitImageDelelte')->name('vendor.product.multiimg.delete');
        Route::get('/inactive/vendor/product/{id}', 'InactiveVendorProduct')->name('inactive.vendor.product');
        Route::get('/active/vendor/product/{id}', 'ActiveVendorProduct')->name('active.vendor.product');
        Route::get('/vendor/product/delete/{id}', 'VendorProductDelete')->name('vendor.product.delete');
    
    });

});
Route::get('/admin/login',[AdminController::class,'AdminLogin'])->middleware(RedirectIfAuthenticated::class);;;
Route::get('/vendor/login',[VendorController::class,'VendorLogin'])->name('vendor.login')->middleware(RedirectIfAuthenticated::class);;;
Route::get('/becom/vendor',[VendorController::class,'BecomeVendor'])->name('becom.vendor');
Route::post('/becom/register',[VendorController::class,'VendorRegister'])->name('becom.register');


Route::middleware(['auth','role:admin'])->group(function(){
// Brand route 
route::controller(BrandController::class)->group(function(){
    Route::get('/all/brand','AllBrand')->name('all.brand');
    Route::get('/add/brand','AddBrand')->name('add.brand');
    Route::post('/store/brand','StoreBrand')->name('store.brand');
    Route::get('/edit/brand/{id}','EditBrand')->name('edit.brand');
    Route::post('/update/brand','UpdateBrand')->name('update.brand');
    Route::get('/delete/brand/{id}','DeleteBrand')->name('delete.brand');

});

// Category route
route::controller(CategoryController::class)->group(function(){
    Route::get('/all/category','Allcategory')->name('all.category');
    Route::get('/add/category','AddCategory')->name('add.category');
    Route::post('/store/category','StoreCategory')->name('store.category');
    Route::get('/edit/category/{id}','EditCategory')->name('edit.category');
    Route::post('/update/category','UpdateCategory')->name('update.category');
    Route::get('/delete/category/{id}','DeleteCategory')->name('delete.category');

});
// SubCategory route
route::controller(SubCategoryController::class)->group(function(){
    Route::get('/all/subcategory','AllSubCategory')->name('all.subcategory');
    Route::get('/add/subcategory','AddSubCategory')->name('add.subcategory');
    Route::post('/store/subcategory','StoreSubCategory')->name('store.subcategory');
    Route::get('/edit/subcategory/{id}','EditSubCategory')->name('edit.subcategory');
    Route::post('/update/subcategory','UpdateSubCategory')->name('update.subcategory');
    Route::get('/delete/subcategory/{id}','DeleteSubCategory')->name('delete.subcategory');
    Route::get('/subcategory/ajax/{category_id}' , 'GetSubCategory');
});

// Vendor active and inactive
route::controller(AdminController::class)->group(function(){
    Route::get('/inactive/vendor','InactiveVendor')->name('inactive.vendor');
    Route::get('/active/vendor','ActiveVendor')->name('active.vendor');
    Route::get('/inactive/vendor/details/{id}','InactiveVendorDetails')->name('inactive.vendor.details');
    Route::post('/active/vendor/approve','ActiveVendorApprove')->name('active.vendor.approve');
    Route::get('/active/vendor/details/{id}','ActiveVendorDetails')->name('active.vendor.details');
    Route::post('/inactive/vendor/approve','InactiveVendorApprove')->name('inactive.vendor.approve');



});
// Product
route::controller(ProductController::class)->group(function(){
    Route::get('/all/product','AllProduct')->name('all.product');
    Route::get('/add/product','AddProduct')->name('add.product');
    Route::post('/store/product','StoreProduct')->name('store.product');
    Route::get('/edit/product/{id}','EditProduct')->name('edit.product');
    Route::post('/update/product','UpdateProduct')->name('update.product');
    Route::post('/update/product/thambnail','UpdateProductThambnail')->name('update.product.thambnail');
    Route::post('/update/product/multiimage' , 'UpdateProductMultiimage')->name('update.product.multiimage');
    Route::get('/product/multiimg/delete/{id}' , 'MulitImageDelelte')->name('product.multiimg.delete');
    Route::get('/inactive/product/{id}', 'InactiveProduct')->name('inactive.product');
    Route::get('/active/product/{id}', 'ActiveProduct')->name('active.product');
    Route::get('/product/delete/{id}', 'ProductDelete')->name('product.delete');
    
});

// Slider
route::controller(SliderController::class)->group(function(){
    Route::get('/all/slider','AllSlider')->name('all.slider');
    Route::get('/add/slider','AddSlider')->name('add.slider');
    Route::post('/store/slider','StoreSlider')->name('store.slider');
    Route::get('/edit/slider/{id}','EditSlider')->name('edit.slider');
    Route::post('/update/slider','UpdateSlider')->name('update.slider');
    Route::get('/slider/delete/{id}', 'SliderDelete')->name('slider.delete');
});
// banner
route::controller(BannerController::class)->group(function(){
    Route::get('/all/banner','AllBanner')->name('all.banner');
    Route::get('/add/banner','AddBanner')->name('add.banner');
    Route::post('/store/banner','StoreBanner')->name('store.banner');
    Route::get('/edit/banner/{id}','EditBanner')->name('edit.banner');
    Route::post('/update/banner','UpdateBanner')->name('update.banner');
    Route::get('/banner/delete/{id}', 'BannerDelete')->name('delete.banner');
    
});

// Coupon
route::controller(CouponController::class)->group(function(){
    Route::get('/all/coupon','AllCoupon')->name('all.coupon');
    Route::get('/add/coupon','AddCoupon')->name('add.coupon');
    Route::post('/store/coupon','StoreCoupon')->name('store.coupon');
    Route::get('/edit/coupon/{id}','EditCoupon')->name('edit.coupon');
    Route::post('/update/coupon','UpdateCoupon')->name('update.coupon');
    Route::get('/coupon/delete/{id}', 'CouponRemove')->name('delete.coupon');
    
});
// Division
route::controller(ShippingAreaController::class)->group(function(){
    Route::get('/all/division','AllDivision')->name('all.division');
    Route::get('/add/division','AddDivision')->name('add.division');
    Route::post('/store/division','StoreDivision')->name('store.division');
    Route::get('/edit/division/{id}','EditDivision')->name('edit.division');
    Route::post('/update/division','UpdateDivision')->name('update.division');
    Route::get('/coupon/division/{id}', 'DivisionRemove')->name('delete.division');
    
});
// District
route::controller(ShippingAreaController::class)->group(function(){
    Route::get('/all/district','AllDistrict')->name('all.district');
    Route::get('/add/district','AddDistrict')->name('add.district');
    Route::post('/store/district','StoreDistrict')->name('store.district');
    Route::get('/edit/district/{id}','EditDistrict')->name('edit.district');
    Route::post('/update/district','UpdateDistrict')->name('update.district');
    Route::get('/coupon/district/{id}', 'DistrictRemove')->name('delete.district');
    
});

 // Shipping State All Route 
 Route::controller(ShippingAreaController::class)->group(function(){
    Route::get('/all/state' , 'AllState')->name('all.state');
    Route::get('/add/state' , 'AddState')->name('add.state');
    Route::post('/store/state' , 'StoreState')->name('store.state');
    Route::get('/edit/state/{id}' , 'EditState')->name('edit.state');
    Route::post('/update/state' , 'UpdateState')->name('update.state');
    Route::get('/delete/state/{id}' , 'DeleteState')->name('delete.state');

    Route::get('/district/ajax/{division_id}' , 'GetDistrict');

});

});// Admin End Middleware 

// Frontend Product Details All Route 

Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);
Route::get('/product/category/{id}/{slug}', [IndexController::class, 'CatWiseProduct']);
Route::get('/product/subcategory/{id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);
Route::get('/product/minicart/remove/{rowId}', [CartController::class, 'RemoveMiniCart']);
Route::post('/dcart/data/store/{id}', [CartController::class, 'AddToCartDetails']);

// Frontend Add to Wishlist 
Route::post('/add-to-wishlist/{product_id}', [WishlistController::class, 'AddToWishList']);

// Frontend Add to Compare 

Route::post('/add-to-compare/{product_id}', [CompareController::class, 'AddToCompare']);

/// Frontend Coupon Option

Route::post('/coupon-apply', [CartController::class, 'CouponApply']);

Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);

Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);


/// Frontend Checkout

Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');



/// card All Route
Route::controller(CartController::class)->group(function(){
    Route::get('/mycart', 'MyCart')->name('mycart');
    Route::get('/get-cart-product' , 'GetCartProduct');
    Route::get('/cart-remove/{rowId}' , 'CartRemove');
    Route::get('/cart-decrement/{rowId}' , 'CartDecrement');
    Route::get('/cart-increment/{rowId}' , 'CartIncrement');

});

/// User All Route
Route::middleware(['auth','role:user'])->group(function() {

Route::controller(WishlistController::class)->group(function(){
    Route::get('/wishlist', 'AllWishlist')->name('wishlist');
    Route::get('/get-wishlist-product' , 'GetWishlistProduct');
    Route::get('/wishlist-remove/{id}' , 'WishlistRemove');
});

/// Compare All Route
Route::controller(CompareController::class)->group(function(){
    Route::get('/compare', 'AllCompare')->name('compare');
    Route::get('/get-compare-product' , 'GetCompareProduct');
    Route::get('/compare-remove/{id}' , 'CompareRemove');
});


/// checkout All Route

Route::controller(CheckoutController::class)->group(function(){
    Route::get('/district-get/ajax/{division_id}' , 'DistrictGetAjax');
    Route::get('/state-get/ajax/{district_id}' , 'StateGetAjax');


}); 


});

