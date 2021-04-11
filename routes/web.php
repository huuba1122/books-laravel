<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\StatusController;
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

Route::get('/', [\App\Http\Controllers\fontEnd\HomeController::class, 'index'])->name('home.index');
Route::post('/', [\App\Http\Controllers\fontEnd\HomeController::class, 'searchBook'])->name('home.search-books');
Route::get('/view-all', [\App\Http\Controllers\fontEnd\HomeController::class, 'viewAll'])->name('home.view-all');
Route::get('/{id}/category-books', [\App\Http\Controllers\fontEnd\HomeController::class, 'getBooksOfCategory'])->name('home.books-of-category');
Route::get('/{id}/book-detail', [\App\Http\Controllers\fontEnd\HomeController::class, 'bookDetail'])->name('home.book-detail');

// login and register customer

Route::get('/login', [\App\Http\Controllers\fontEnd\HomeController::class, 'loginCustomer'])->name('home.login');
Route::get('/register', [\App\Http\Controllers\fontEnd\HomeController::class, 'showFormRegister'])->name('home.show-form-register');
Route::post('/login', [\App\Http\Controllers\fontEnd\HomeController::class, 'checkLogin'])->name('home.check-login');
Route::get('/logout', [\App\Http\Controllers\fontEnd\HomeController::class, 'logout'])->name('home.logout');
Route::post('/register', [\App\Http\Controllers\fontEnd\HomeController::class, 'register'])->name('home.register');

// Checkout cart
Route::get('/checkout', [\App\Http\Controllers\fontEnd\HomeController::class, 'showFormCheckOut'])->name('home.show-form-checkout');
Route::post('/checkout', [\App\Http\Controllers\fontEnd\HomeController::class, 'checkout'])->name('home.checkout');

// cart

Route::prefix('/cart')->group(function (){
    Route::get('/{id}/add',[\App\Http\Controllers\fontEnd\CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/show-cart',[\App\Http\Controllers\fontEnd\CartController::class, 'showCart'])->name('cart.show');
    Route::get('/update-cart',[\App\Http\Controllers\fontEnd\CartController::class, 'updateCart'])->name('cart.update');
    Route::get('/{id}/remove-cart',[\App\Http\Controllers\fontEnd\CartController::class, 'removeProduct'])->name('cart.remove');
    Route::get('/delete-cart',[\App\Http\Controllers\fontEnd\CartController::class, 'deleteCart'])->name('cart.delete');
});

Route::prefix('/books')->group(function (){

});



// quan ly admin

Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminLoginController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'checkLogin'])->name('admin.check-login');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::middleware('checkLoginAdmin')->group(function () {

        Route::prefix('/users')->group(function () {
            Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('users.list')
                ->middleware('can:list_user');

            Route::get('/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create')
                ->middleware('can:add_user');

            Route::post('/create', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');

            Route::get('/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit')
                ->middleware('can:edit_user');

            Route::post('/{id}/edit', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');

            Route::get('/{id}/delete', [\App\Http\Controllers\UserController::class, 'delete'])->name('users.delete')
                ->middleware('can:delete_user');
        });

        Route::prefix('/roles')->group(function () {
            Route::get('/', [\App\Http\Controllers\RoleController::class, 'index'])->name('roles.list')
                ->middleware('can:list_role');
            Route::get('/create', [\App\Http\Controllers\RoleController::class, 'create'])->name('roles.create')
                ->middleware('can:add_role');
            Route::post('/create', [\App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
            Route::get('/{id}/edit', [\App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit')
                ->middleware('can:edit_role');
            Route::post('/{id}/edit', [\App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
            Route::get('/{id}/delete', [\App\Http\Controllers\RoleController::class, 'delete'])->name('roles.delete')
                ->middleware('can:delete_role');
        });

        Route::prefix('/permissions')->group(function () {
            Route::get('/', [\App\Http\Controllers\PermissionController::class, 'index'])
                ->name('permissions.list')->middleware('can:list_permission');
            Route::get('/create', [\App\Http\Controllers\PermissionController::class, 'create'])
                ->name('permissions.create')->middleware('can:add_permission');
            Route::post('/create', [\App\Http\Controllers\PermissionController::class, 'store'])
                ->name('permissions.store');
            Route::get('/{id}/edit', [\App\Http\Controllers\PermissionController::class, 'edit'])
                ->name('permissions.edit')->middleware('can:edit_permission');
            Route::post('/{id}/edit', [\App\Http\Controllers\PermissionController::class, 'update'])
                ->name('permissions.update');
            Route::get('/{id}/delete', [\App\Http\Controllers\PermissionController::class, 'delete'])
                ->name('permissions.delete')->middleware('can:delete_permission');
        });

        Route::prefix('/book')->group(function () {
            Route::get('/', [BookController::class, 'index'])->name('book.index')
                ->middleware('can:list_product');

            Route::post('/', [BookController::class, 'search'])->name('book.search');

            Route::get('/create', [BookController::class, 'create'])->name('book.create')
                ->middleware('can:add_product');

            Route::post('/create', [BookController::class, 'store'])->name('book.store');

            Route::get('/{id}/edit', [BookController::class, 'edit'])->name('book.edit')
                ->middleware('can:edit_product');

            Route::post('/{id}/edit', [BookController::class, 'update'])->name('book.update');

            Route::get('/{id}/detail', [BookController::class, 'detail'])->name('book.detail');

            Route::get('/{id}/delete', [BookController::class, 'delete'])->name('book.delete')
                ->middleware('can:delete_product');
        });

        Route::prefix('/author')->group(function () {
            Route::get('/', [AuthorController::class, 'index'])->name('author.index')
                ->middleware('can:list_author');

            Route::post('/', [AuthorController::class, 'search'])->name('author.search');
//        Route::get('/create',[AuthorController::class,'create'])->name('author.create');
            Route::post('/create', [AuthorController::class, 'store'])->name('author.store');

            Route::get('/{id}/edit', [AuthorController::class, 'edit'])->name('author.edit')
                ->middleware('can:edit_author');

            Route::post('/{id}/edit', [AuthorController::class, 'update'])->name('author.update');

            Route::get('/{id}/delete', [AuthorController::class, 'delete'])->name('author.delete')
                ->middleware('can:delete_author');
        });

        Route::prefix('/category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('category.index')->middleware('can:list_category');
//        Route::get('/create',[CategoryController::class,'create'])->name('category.create');
            Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
            Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit')->middleware('can:edit_category');
            Route::post('/{id}/edit', [CategoryController::class, 'update'])->name('category.update');
            Route::get('/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete')->middleware('can:delete_category');
        });

        Route::prefix('/publisher')->group(function () {
            Route::get('/', [PublisherController::class, 'index'])->name('publisher.index')->middleware('can:list_publisher');
//        Route::get('/create',[PublisherController::class,'create'])->name('publisher.create');
            Route::post('/create', [PublisherController::class, 'store'])->name('publisher.store');
            Route::get('/{id}/edit', [PublisherController::class, 'edit'])->name('publisher.edit')->middleware('can:edit_publisher');
            Route::post('/{id}/edit', [PublisherController::class, 'update'])->name('publisher.update');
            Route::get('/{id}/delete', [PublisherController::class, 'delete'])->name('publisher.delete')->middleware('can:delete_publisher');
        });

        Route::prefix('/status')->group(function () {
            Route::get('/', [StatusController::class, 'index'])->name('status.index')
                ->middleware('can:list_status');

//        Route::get('/create',[StatusController::class,'create'])->name('status.create');
            Route::post('/create', [StatusController::class, 'store'])->name('status.store');

            Route::get('/{is}/edit', [StatusController::class, 'edit'])->name('status.edit')
                ->middleware('can:edit_status');

            Route::post('/{is}/edit', [StatusController::class, 'update'])->name('status.update');

            Route::get('/{is}/delete', [StatusController::class, 'delete'])->name('status.delete')
                ->middleware('can:delete_status');
        });

        Route::prefix('/customers')->group(function (){
            Route::get('/',[CustomerController::class,'index'])->name('customers.index')
                ->middleware('can:list_customer');

            Route::get('/{id}/edit',[CustomerController::class,'edit'])->name('customers.edit')
                ->middleware('can:edit_customer');

            Route::post('/{id}/edit',[CustomerController::class,'update'])->name('customers.update');

            Route::get('/{id}/delete',[CustomerController::class,'delete'])->name('customers.delete')
                ->middleware('can:delete_customer');
        });

        Route::prefix('/order')->group(function (){
            Route::get('/',[OrderController::class, 'index'])->name('orders.index')
                ->middleware('can:list_order');

            Route::get('/{id}/edit',[OrderController::class, 'edit'])->name('orders.edit');


            Route::post('/{id}/edit',[OrderController::class, 'update'])->name('orders.update')
                ->middleware('can:edit_order');

            Route::get('/{id}/detail',[OrderController::class, 'detail'])->name('orders.detail');

            Route::get('/{id}/delete',[OrderController::class, 'delete'])->name('orders.delete')
                ->middleware('can:delete_order');
        });

    });
});
