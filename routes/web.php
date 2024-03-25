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

Route::get('', function () {
    return view('frontend.index');
});

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
        // Route::get('/inactive/product/{id}', 'InactiveProduct')->name('inactive.product');
        // Route::get('/active/product/{id}', 'ActiveProduct')->name('active.product');
        // Route::get('/product/delete/{id}', 'ProductDelete')->name('product.delete');
    
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
// Vendor Product


});     