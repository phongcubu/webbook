<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeControllers;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Posts;
use App\Models\Post;
use App\Http\Controllers\ContactController;

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
Route::post('admin-dashbord/',[AdminController::class, 'dashboard'])->name('admin-dashbord');
// -------------Contact
Route::get('contact-form/', [ContactController::class, 'contactForm'])->name('contact-form');
Route::post('contact-form/', [ContactController::class, 'storeContactForm'])->name('contact-form.store');

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



// ----------- CATEGORY POST ---------
Route::get('add-category-post/', [PostController::class, 'add_category_post'])->name('add-category-post');
Route::get('all-category-post/', [PostController::class, 'all_category_post'])->name('all-category-post');
// sửa danh mục sản phẩm trong liệt kê danh mục
Route::get('edit-category-post/{category_post_id}',[PostController::class, 'edit_category_post'])->name('edit-category-post');
// xóa danh mục sản phẩm trong liệt kê danh mục
Route::get('delete-category-post/{category_post_id}',[PostController::class, 'deletee_category_post'])->name('delete-category-post');
Route::post('save-category-post/',[PostController::class, 'save_category_post'])->name('save-category-post');
Route::post('update-category-post/{category_post_id}',[PostController::class, 'update_category_post'])->name('update-category-post');





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

// ----- KHÁCH HÀNG
Route::get('all-user/', [AdminController::class, 'all_user'])->name('all-user');

// -----------Product---------
Route::get('add-product/', [ProductController::class, 'add_product'])->name('add-product');
Route::get('all-product/',[ProductController::class, 'all_product'])->name('all-product');

Route::get('active-product/{product_id}',[ProductController::class, 'active_product'])->name('active-product');
Route::get('unactive-product/{product_id}',[ProductController::class, 'unactive_product'])->name('unactive-product');

Route::post('save-product/',[ProductController::class, 'save_product'])->name('save-product');
Route::post('update-product/{product_id}',[ProductController::class, 'update_product'])->name('update-product');

Route::get('edit-product/{product_id}',[ProductController::class, 'edit_product'])->name('edit-product');
Route::get('delete-product/{product_id}',[ProductController::class, 'deletee_product'])->name('delete-product');

//  -------------------Post -----------
Route::get('add-post/', [Posts::class, 'add_post'])->name('add-post');
Route::post('save-post/',[Posts::class, 'save_post'])->name('save-post');
Route::get('all-post/',[Posts::class, 'all_post'])->name('all-post');
Route::get('delete-post/{post_id}',[Posts::class, 'delete_post'])->name('delete-post');
Route::get('edit-post/{post_id}',[Posts::class, 'edit_post'])->name('edit_post');
Route::post('update-post/{post_id}',[Posts::class, 'update_post'])->name('update_post');
Route::get('danh-muc-bai-viet/{category_post_slug}', [Posts::class, 'danh_muc_bai_viet'])->name('danh-muc-bai-viet');
Route::get('bai-viet/{post_slug}', [Posts::class, 'bai_viet'])->name('bai-viet');

// -----Cart----------
Route::post('save-cart/',[CartController::class, 'save_cart'])->name('save-cart');
Route::post('update-cart-quantity/',[CartController::class, 'update_cart_quantity'])->name('update-cart-quantity');

Route::get('show-cart/',[CartController::class, 'show_cart'])->name('show-cart');
Route::get('delete-to-cart/{rowId}',[CartController::class, 'delete_to_cart'])->name('delete-to-cart');

// ---Checkout----
Route::get('login-checkout/',[CheckoutController::class, 'login_checkout'])->name('login-checkout');
Route::get('logout-checkout/',[CheckoutController::class, 'logout_checkout'])->name('logout-checkout');
Route::get('checkout/',[CheckoutController::class, 'checkout'])->name('checkout');
Route::get('transaction/',[CheckoutController::class, 'transaction'])->name('transaction');
//payment
Route::post('create/payment',[CheckoutController::class, 'createPayment'])->name('create.payment');
Route::get('vnpay/return',[CheckoutController::class, 'vnpayReturn'])->name('vnpay.return');

//  lưu dữ liệu form
Route::post('login-customer/',[CheckoutController::class, 'login_customer'])->name('login-customer'); // đăng nhập người dùng
Route::post('add-customer',[CheckoutController::class, 'add_customer'])->name('add-customer'); // đăng kí người dùng
Route::post('save-checkout-customer',[CheckoutController::class, 'save_checkout_customer'])->name('save-checkout-customer');
Route::post('order-transaction-place',[CheckoutController::class, 'order_transaction_place'])->name('order-transaction-place');
//Order
Route::get('manage-order/',[CheckoutController::class, 'manage_order'])->name('manage-order');
Route::get('view-order/{orderId}',[CheckoutController::class, 'view_order'])->name('view-order');