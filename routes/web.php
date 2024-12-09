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
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\AdminPostsController;
use App\Http\Controllers\AdminControllers\TinyMCEController;
use App\Http\Controllers\AdminControllers\AdminCategoriesController;
use App\Http\Controllers\AdminControllers\AdminTagsController;
use App\Http\Controllers\AdminControllers\AdminCommentsController;
use App\Http\Controllers\AdminControllers\AdminRolesController;
use App\Http\Controllers\AdminControllers\AdminUsersController;
use App\Http\Controllers\AdminControllers\AdminContactsController;
use App\Http\Controllers\AdminControllers\AdminSettingController;
use App\Http\Controllers\AdminControllers\AdminOrderItemsController;
use App\Http\Controllers\AdminControllers\AdminOrdersController;
use App\Http\Controllers\AdminControllers\AdminPostHistorieController;
use App\Http\Controllers\AdminControllers\AdminPostImagesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminControllers\AdminProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\VNPayController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\AdsPaymentController;
use App\Http\Controllers\AdsHistoryController;



// Điều hướng cho User

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'check.premium'])->group(function () {
    Route::get('/premium', [HomeController::class, 'premium'])->name('premium');
    Route::get('/premium/upgrade', [PremiumController::class, 'upgrade'])->name('premium.upgrade');
    Route::get('ads/create', [AdsController::class, 'create'])->name('ads.form');
    Route::get('ads/index', [AdsController::class, 'index'])->name('ads.index');
    Route::post('ads/store', [AdsController::class, 'store'])->name('ads.store');
    Route::get('ads/history', [AdsController::class, 'history'])->name('ads.history');
    Route::get('ads/payment/{ad_id}', [AdsPaymentController::class, 'pay'])->name('ads.payment');
    Route::post('ads/payment/{ad_id}', [AdsPaymentController::class, 'processPayment'])->name('ads.processPayment');
    Route::get('ads/history/cancel/{ad_id}', [AdsHistoryController::class, 'cancel'])->name('ads.cancel');
});


Route::get('/payment/vnpay', [VNPayController::class, 'createPayment'])->name('vnpay.create');
Route::get('/payment/vnpay/return', [VNPayController::class, 'returnPayment'])->name('vnpay.return');


Route::get('/tai-khoan', [HomeController::class, 'profile'])->name('profile');
Route::post('/tai-khoan', [HomeController::class, 'update'])->name('update');

Route::get('/404', [HomeController::class, 'erorr404'])->name('erorrs.404');

Route::post('/tim-kiem', [HomeController::class, 'search'])->name('search');
Route::get('/tin-tuc-moi-nhat', [HomeController::class, 'newPost'])->name('newPost');
Route::get('/tin-nong', [HomeController::class, 'hotPost'])->name('hotPost');
Route::get('/xem-nhieu-nhat', [HomeController::class, 'viewPost'])->name('viewPost');

Route::get('/bai-vet/{post:slug}', [PostsController::class, 'show'])->name('posts.show');
Route::post('/bai-viet/{post:slug}', [PostsController::class, 'addComment'])->name('posts.add_comment');
Route::post('/binh-luan', [PostsController::class, 'addCommentUser'])->name('posts.addCommentUser');



Route::get('/gioi-thieu', AboutController::class)->name('about');

Route::get('/lien-he', [ContactController::class, 'create'])->name('contact.create');
Route::post('/lien-he', [ContactController::class, 'store'])->name('contact.store');


Route::get('shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('shop/{id}', [ShopController::class, 'show'])->name('shop.show');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
Route::post('/vnpay-payment', [CheckoutController::class,'vnpay_payment'])->name('vnpay-payment');
Route::get('vnpay-index', [CheckoutController::class, 'vnpay_payment_callback'])->name('vnpay-index');
Route::post('/momo-payment', [CheckoutController::class,'momo_payment'])->name('momo-payment');


Route::middleware('auth')->group(function () {
    Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/my-orders/{id}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
});


Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/remove/{itemId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::patch('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/update', [CartController::class, 'updateAllCart'])->name('cart.updateAll');
});


Route::middleware('auth')->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add/{productId}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{productId}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
});

Route::get('/chuyen-muc/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/tat-ca-chuyen-muc', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/tu-khoa/{tag:name}', [TagController::class, 'show'])->name('tags.show');

Route::post('email', [NewsletterController::class, 'store'])->name('newsletter_store');
require __DIR__ . '/auth.php';


// Điều hướng cho trang quản trị admin -
Route::prefix('admin')->name('admin.')->middleware(['auth', 'check_permissions'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::post('upload_tinymce_image', [TinyMCEController::class, 'upload_tinymce_image'])->name('upload_tinymce_image');

    Route::resource('posts', AdminPostsController::class);
    Route::get('post-soft-delete', [AdminPostsController::class , 'postSoftDelete'])->name('post-soft-delete');
    Route::put('posts/soft-delete/{post}', [AdminPostsController::class , 'softDelete'])->name('post.softDelete');
    Route::put('posts/undo-soft-delete/{post}', [AdminPostsController::class , 'undoSoftDelete'])->name('post.undoSoftDelete');
    Route::get('post-history',[AdminPostHistorieController::class, 'index'])->name('post-history.index');
    Route::delete('post-history/{postHistorie}',[AdminPostHistorieController::class, 'destroy'])->name('post-history.destroy');
    Route::delete('post-history',[AdminPostHistorieController::class, 'removeAll'])->name('post-history.removeAll');
    Route::post('/poststitle', [AdminPostsController::class, 'to_slug'])->name('posts.to_slug');
    // Route::delete('post-img/{id}',[AdminPostImagesController::class, 'destroy'])->name('post-img.destroy');
    Route::resource('categories', AdminCategoriesController::class);
    Route::resource('tags', AdminTagsController::class)->only(['index', 'show', 'destroy']);
    Route::resource('comments', AdminCommentsController::class)->except('show');
    Route::resource('roles', AdminRolesController::class)->except('show');
    Route::resource('users', AdminUsersController::class);
    Route::get('contacts', [AdminContactsController::class, 'index'])->name('contacts');
    Route::delete('contacts/{contact}', [AdminContactsController::class, 'destroy'])->name('contacts.destroy');

    // Thêm các route cho products, orders, order_items
    Route::resource('products', AdminProductsController::class);

    Route::resource('orders', AdminOrdersController::class);
    Route::resource('order_items', AdminOrderItemsController::class);

    Route::get('about', [AdminSettingController::class, 'edit'])->name('setting.edit');
    Route::post('about', [AdminSettingController::class, 'update'])->name('setting.update');
});