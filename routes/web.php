<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;



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


// ADMIN
// admin dashboard
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');


//show all categories
Route::get('/admin/category', [AdminController::class, 'indexCategory'])->name('admin.index-category')->middleware('auth');
//show create category form
Route::get('/admin/category/create', [AdminController::class, 'createCategory'])->name('admin.create-category')->middleware('auth');
//save category
Route::post('/admin/category/create', [AdminController::class, 'storeCategory'])->name('admin.store-category')->middleware('auth');
// show edit category form
Route::get('/admin/category/{categoryId}/edit', [AdminController::class, 'editCategory'])->name('admin.edit-category')->middleware('auth');
// update category
Route::put('/admin/category/{categoryId}', [AdminController::class, 'updateCategory'])->name('admin.update-category')->middleware('auth');
// delete category
Route::delete('/admin/category/{categoryId}', [AdminController::class, 'destroyCategory'])->name('admin.destroy-category')->middleware('auth');




// show all auctions
Route::get('/admin/auction', [AdminController::class, 'indexAuction'])->name('admin.index-auction')->middleware('auth');
// show create auction form
Route::get('/admin/auction/create', [AdminController::class, 'createAuction'])->name('admin.create-auction')->middleware('auth');
// store auction record
Route::post('/admin/auction/create', [AdminController::class, 'storeAuction'])->name('admin.store-auction')->middleware('auth');
// show edit auction form
Route::get('/admin/auction/{auctionId}/edit', [AdminController::class, 'editAuction'])->name('admin.edit-auction')->middleware('auth');
// update auction
Route::put('/admin/auction/{auctionId}', [AdminController::class, 'updateAuction'])->name('admin.update-auction')->middleware('auth');
// delete auction
Route::delete('/admin/auction/{auctionId}', [AdminController::class, 'destroyAuction'])->name('admin.destroy-auction')->middleware('auth');





// show all items for an auction
Route::get('/admin/{auctionId}/item', [AdminController::class, 'indexItem'])->name('admin.index-item')->middleware('auth');
// show create item form
Route::get('/admin/{auctionId}/item/create', [AdminController::class, 'createItem'])->name('admin.create-item')->middleware('auth');
// store item record
Route::post('/admin/{auctionId}/item/create', [AdminController::class, 'storeItem'])->name('admin.store-item')->middleware('auth');
// show edit item form
Route::get('/admin/item/{itemId}/edit', [AdminController::class, 'editItem'])->name('admin.edit-item')->middleware('auth');
// update item
Route::put('/admin/item/{itemId}', [AdminController::class, 'updateItem'])->name('admin.update-item')->middleware('auth');
// delete item
Route::delete('/admin/item/{itemId}', [AdminController::class, 'destroyItem'])->name('admin.destroy-item')->middleware('auth');



// LOGIN
//show login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login-form');
//log user in
Route::post('/login', [LoginController::class, 'login'])->name('login');
// log user out
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');




// // tester
// Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register-form');
// Route::post('/register', [LoginController::class, 'create'])->name('register');






// HOME
Route::get('/', [HomeController::class, 'index'])->name('index');

// show all auctions
Route::get('/auctions', [HomeController::class, 'indexAuction'])->name('index-auction');
// show all items of an auction
Route::get('/auctions/{auction}', [HomeController::class, 'viewAuctionItems'])->name('auction-items');
// show single auction item 
Route::get('/auctions/{auctionId}/item/{itemId}', [HomeController::class, 'singleAuctionItem'])->name('single-item');
//search for auction
Route::get('/search', [HomeController::class, 'search'])->name('search');








