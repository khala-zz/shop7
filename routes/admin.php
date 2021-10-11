<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminBrandController;
use App\Http\Controllers\admin\AdminSliderController;
use App\Http\Controllers\admin\AdminSettingController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminCouponController;
use App\Http\Controllers\admin\AdminOrderController;
use App\Http\Controllers\admin\AdminReviewController;
use App\Http\Controllers\admin\AdminCatNewsController;
use App\Http\Controllers\admin\AdminNewsController;
use App\Http\Controllers\admin\AdminTagController;
use App\Http\Controllers\admin\AdminContactController;
use App\Http\Controllers\admin\AdminNewsletterController;
use App\Http\Controllers\admin\AdminBannerController;
use App\Http\Controllers\admin\AdminLinkController;

//backend
Route::middleware(['auth']) -> prefix('/khalaadmin') -> group(function(){
  //home admin
	Route::get('/', function () {
		return view('admin.pages.home.index');
	});
  //dashboard
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');

  Route::resource('/users', UsersController::class);
  //xoa user ajax
  Route::get('/delete-user/{id}',[UsersController::class,'delete']) -> name('user.delete');
  Route::get('/my-profile', [UsersController::class, 'getProfile']);
  Route::get('/my-profile/edit', [UsersController::class, 'getEditProfile']);
  Route::patch('/my-profile/edit', [UsersController::class, 'postEditProfile']);
  //permission resource tu dong action vao  xoa,sua,delete,view trong controller theo duong dan mac dinh create,edit..
  Route::resource('/permissions', PermissionsController::class);
  //xoa permission ajax
  Route::get('/delete-permission/{id}',[PermissionsController::class,'delete']) -> name('permission.delete');
  //role
  Route::resource('/roles', RolesController::class);
  //xoa role ajax
  Route::get('/delete-role/{id}',[RolesController::class,'delete']) -> name('role.delete');

  Route::get('/users/role/{id}', [UsersController::class, 'getRole']);

  Route::put('/users/role/{id}', [UsersController::class, 'updateRole']);

  // category
  Route::resource('/categories', AdminCategoryController::class);
  //xoa category ajax
  Route::get('/delete-category/{id}',[AdminCategoryController::class,'delete']) -> name('category.delete');

  // category news
  Route::resource('/cat_news', AdminCatNewsController::class);
  //xoa category news ajax
  Route::get('/delete-cat_news/{id}',[AdminCatNewsController::class,'delete']) -> name('cat_news.delete');

   // news
  Route::resource('/news', AdminNewsController::class);
  //xoa news ajax
  Route::get('/delete-news/{id}',[AdminNewsController::class,'delete']) -> name('news.delete');

  // banners
  Route::resource('/banners', AdminBannerController::class);
  //xoa category news ajax
  Route::get('/delete-banner/{id}',[AdminBannerController::class,'delete']) -> name('banner.delete');

  // link
  Route::resource('/links', AdminLinkController::class);
  //xoa category news ajax
  Route::get('/delete-link/{id}',[AdminLinkController::class,'delete']) -> name('link.delete');

   // tags
  Route::resource('/tags', AdminTagController::class);
  //xoa tags ajax
  Route::get('/delete-tags/{id}',[AdminTagController::class,'delete']) -> name('tags.delete');
  
  // brand
  Route::resource('/brands', AdminBrandController::class);
  //xoa brand ajax
  Route::get('/delete-brand/{id}',[AdminBrandController::class,'delete']) -> name('brand.delete');

  // slider
  Route::resource('/sliders', AdminSliderController::class);
  //xoa slider ajax
  Route::get('/delete-slider/{id}',[AdminSliderController::class,'delete']) -> name('slider.delete');
  
  // setting
  Route::resource('/settings', AdminSettingController::class);
  //xoa setting ajax
  Route::get('/delete-setting/{id}',[AdminSettingController::class,'delete']) -> name('setting.delete');

  // order
  Route::resource('/orders', AdminOrderController::class);
  //xoa order ajax
  Route::get('/delete-order/{id}',[AdminOrderController::class,'delete']) -> name('order.delete');

  // review
  Route::resource('/reviews', AdminReviewController::class);
  //xoa review ajax
  Route::get('/delete-review/{id}',[AdminReviewController::class,'delete']) -> name('review.delete');

   // contact
  Route::resource('/contacts', AdminContactController::class);
  //route cho cập nhật xu lý và chưa xử lý
   Route::get('/contacts/xuly/{id}/{status}', [AdminContactController::class,'xuly']);
  //xoa contact ajax
  Route::get('/delete-contact/{id}',[AdminContactController::class,'delete']) -> name('contact.delete');

   // newsletter
  Route::get('/newsletters', [AdminNewsletterController::class,'index']);
  //route cho cập nhật xu lý và chưa xử lý
   Route::get('/newsletters/xuly/{id}/{status}', [AdminNewsletterController::class,'xuly']);
  //xoa contact ajax
  Route::get('/delete-newsletter/{id}',[AdminNewsletterController::class,'delete']) -> name('newsletter.delete');
  
  // product
  Route::resource('/products', AdminProductController::class);
  //xoa product ajax
  Route::get('/delete-product/{id}',[AdminProductController::class,'delete']) -> name('product.delete');
  
  //get features khi thay doi category trong quan ly product
  Route::get('/get-product-features', [AdminProductController::class, 'getFeatures']);
  
  //xóa image gallery delete-image-product-gallery
  Route::get('/delete-image-product-gallery', [AdminProductController::class, 'deleteImageGallery']);
  
  // coupon
  Route::resource('/coupons', AdminCouponController::class);
  //xoa coupon ajax
  Route::get('/delete-coupon/{id}',[AdminCouponController::class,'delete']) -> name('coupon.delete');

 

  
  Route::get('/forbidden', function () {
    return view('admin.pages.forbidden.forbidden_area');
  });

});


