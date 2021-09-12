<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeControllers;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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

//Fronend
Route::get('/', [HomeControllers ::class, 'home']);
Route::get('trang-chu/', [HomeControllers ::class, 'home'])->name('trang-chu');
Route::post('search/', [HomeControllers ::class, 'search'])->name('search');

//Danh muc san pham
Route::get('danh-muc-san-pham/{category_id}', [CategoryProduct ::class, 'show_category_home']);
Route::get('thuong-hieu-san-pham/{brand_id}', [BrandProduct ::class, 'show_brand_home']);
Route::get('chi-tiet-san-pham/{product_id}', [ProductController ::class, 'details_product']);

//----------BACKEND(dashboard)---------------
//vào trang login đăng nhập
Route::get('admin-login/', [AdminController::class, 'index'])->name('admin-login');
// vào trang chủ bảng điều khiển
Route::get('dashboard/',[AdminController::class, 'show_dashboard']);
// logout
Route::get('logout/', [AdminController::class, 'logout'])->name('logout');
// vào trang chủ bảng điều khiển khi login
Route::post('admin-dashbord/',[AdminController::class, 'dashboard']);


// ----------- Category Product Dashboard---------
//trang hiển danh mục sản phẩm
Route::get('add-category-product/', [CategoryProduct::class, 'add_category_product'])->name('add-category-product');
// trang hiển thị liệt kê danh mục sản phẩm 
Route::get('all-category-product/',[CategoryProduct::class, 'all_category_product'])->name('all-category-product');

//  đường dẫn nút hiện  trong liệt kê danh mục sản phẩm
Route::get('active-category-product/{category_product_id}',[CategoryProduct::class, 'active_category_product'])->name('active-category-product');
//  đường dẫn nút ẩn trong liệt kê danh mục sản phẩm
Route::get('unactive-category-product/{category_product_id}',[CategoryProduct::class, 'unactive_category_product'])->name('unactive-category-product');

// lưu danh mục sau khi được thêm
Route::post('save-category-product/',[CategoryProduct::class, 'save_category_product'])->name('save-category-product');
// cập nhật danh mục sau khi được thêm
Route::post('update-category-product/{category_product_id}',[CategoryProduct::class, 'update_category_product'])->name('update-category-product');

// sửa danh mục sản phẩm trong liệt kê danh mục
Route::get('edit-category-product/{category_product_id}',[CategoryProduct::class, 'edit_category_product'])->name('edit-category-product');
// xóa danh mục sản phẩm trong liệt kê danh mục
Route::get('delete-category-product/{category_product_id}',[CategoryProduct::class, 'deletee_category_product'])->name('delete-category-product');


// ----------- Brand Product Dashboard---------
//trang hiển danh mục sản phẩm
Route::get('add-brand-product/', [BrandProduct::class, 'add_brand_product'])->name('add-brand-product');
// trang hiển thị liệt kê danh mục sản phẩm 
Route::get('all-brand-product/',[BrandProduct::class, 'all_brand_product'])->name('all-brand-product');

//  đường dẫn nút hiện  trong liệt kê danh mục sản phẩm
Route::get('active-brand-product/{brand_product_id}',[BrandProduct::class, 'active_brand_product'])->name('active-brand-product');
//  đường dẫn nút ẩn trong liệt kê danh mục sản phẩm
Route::get('unactive-brand-product/{brand_product_id}',[BrandProduct::class, 'unactive_brand_product'])->name('unactive-brand-product');

// lưu danh mục sau khi được thêm
Route::post('save-brand-product/',[BrandProduct::class, 'save_brand_product'])->name('save-brand-product');
// cập nhật danh mục sau khi được thêm
Route::post('update-brand-product/{brand_product_id}',[BrandProduct::class, 'update_brand_product'])->name('update-brand-product');

// sửa danh mục sản phẩm trong liệt kê danh mục
Route::get('edit-brand-product/{brand_product_id}',[BrandProduct::class, 'edit_brand_product'])->name('edit-brand-product');
// xóa danh mục sản phẩm trong liệt kê danh mục
Route::get('delete-brand-product/{brand_product_id}',[BrandProduct::class, 'deletee_brand_product'])->name('delete-brand-product');


// -----------Product---------
Route::get('add-product/', [ProductController::class, 'add_product'])->name('add-product');
Route::get('all-product/',[ProductController::class, 'all_product'])->name('all-product');

Route::get('active-product/{product_id}',[ProductController::class, 'active_product'])->name('active-product');
Route::get('unactive-product/{product_id}',[ProductController::class, 'unactive_product'])->name('unactive-product');

Route::post('save-product/',[ProductController::class, 'save_product'])->name('save-product');
Route::post('update-product/{product_id}',[ProductController::class, 'update_product'])->name('update-product');

Route::get('edit-product/{product_id}',[ProductController::class, 'edit_product'])->name('edit-product');
Route::get('delete-product/{product_id}',[ProductController::class, 'deletee_product'])->name('delete-product');

// -----Cart
Route::post('save-cart/',[CartController::class, 'save_cart'])->name('save-cart');
Route::post('update-cart-quantity/',[CartController::class, 'update_cart_quantity'])->name('update-cart-quantity');

Route::get('show-cart/',[CartController::class, 'show_cart'])->name('show-cart');
Route::get('delete-to-cart/{rowId}',[CartController::class, 'delete_to_cart'])->name('delete-to-cart');

// ---checkout
Route::get('login-checkout/',[CheckoutController::class, 'login_checkout'])->name('login-checkout');
Route::get('logout-checkout/',[CheckoutController::class, 'logout_checkout'])->name('logout-checkout');
Route::get('checkout/',[CheckoutController::class, 'checkout'])->name('checkout');
Route::get('payment/',[CheckoutController::class, 'payment'])->name('payment');
//  lưu dữ liệu form
Route::post('login-customer/',[CheckoutController::class, 'login_customer'])->name('login-customer'); // đăng nhập người dùng
Route::post('add-customer',[CheckoutController::class, 'add_customer'])->name('add-customer'); // đăng kí người dùng
Route::post('save-checkout-customer',[CheckoutController::class, 'save_checkout_customer'])->name('save-checkout-customer');
Route::post('order-payment-place',[CheckoutController::class, 'order_payment_place'])->name('order-payment-place');