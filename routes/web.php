<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Main\LoginController;
use App\Http\Controllers\Customer\SignInUp;
use App\Http\Controllers\Customer\ProductDetailsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Main\RegisterController;
use App\Http\Controllers\Main\ShopController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Main\CartController;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Main Route
// If user press login we check if user was logged
Route::group(['prefix' => 'login', 'middleware' => 'CheckLoggedIn'], function() {
    Route::get('/', [LoginController::class, 'getLogin']);
    Route::post('/', [LoginController::class, 'postLogin']);
});

Route::group(['prefix' => 'register'], function() {
    Route::get('/', [RegisterController::class, 'getRegister']);
    Route::post('/', [RegisterController::class, 'postRegister']);
});

Route::get('/logout', [HomeController::class, 'getLogout']);

Route::get('/', [ShopController::class, 'getMainPage']);

Route::group(['prefix' => 'cart'], function(){
    Route::get('/add/{product_id}', [CartController::class, 'getAddToCart']);

    Route::get('/show', [CartController::class, 'getShowCart']);

    Route::get('/remove/{cart_id}', [CartController::class, 'getRemoveCart']);

    Route::get('/destroy', [CartController::class, 'getDestroyCart']);

    Route::get('/checkout', [CartController::class, 'getCheckout']);
});

Route::group(['prefix' => 'shop'], function(){
    Route::get('/', [ShopController::class, 'getShopProduct']);
    Route::get('/search', [ShopController::class, 'getSearchResult']);

    Route::get('/detail/{product_slug}', [ShopController::class, 'getProductInformation']);
    Route::post('/detail/{product_slug}', [ShopController::class, 'postProductComment']);

    // Route::get('/checkout/', [ShopController::class, 'getCheckout']);

    Route::get('category/{category_id}/{category_slug}', [ShopController::class, 'getProductByCategory']);
});

// Group Route In Folder Admin
Route::group(['namespace' => 'Admin'], function() {

    // Check if guest try to go home page with out loggin
    Route::group(['prefix' => 'admin', 'middleware' => ['CheckLoggedOut', 'AdminLoggin']], function(){
        Route::get('/home', [HomeController::class, 'getHome']);

        Route::group(['prefix' => 'category'], function(){
            Route::get('/', [CategoryController::class, 'getCategory']);

            Route::get('/add/', [CategoryController::class, 'getAddCategory']);
            Route::post('/add/', [CategoryController::class, 'postAddCategory']);

            Route::get('/edit/{id}', [CategoryController::class, 'getEditCategory']);
            Route::post('/edit/{id}', [CategoryController::class, 'postEditCategory']);

            Route::get('/delete/{id}', [CategoryController::class, 'getDeleteCategory']);
        });

        Route::group(['prefix' => 'product'], function(){
            Route::get('/', [ProductController::class, 'getProduct']);


            Route::get('/add', [ProductController::class, 'getAddProduct']);
            Route::post('/add', [ProductController::class, 'postAddProduct']);

            Route::get('/edit/{id}', [ProductController::class, 'getEditProduct']);
            Route::post('/edit/{id}', [ProductController::class, 'postEditProduct']);

            Route::get('/delete/{id}', [ProductController::class, 'getDeleteProduct']);
        });

        Route::group(['prefix' => 'user'], function(){
            Route::get('/', [UserController::class, 'getUser']);
            Route::get('/edit/{user_id}', [UserController::class, 'getEditUser']);
            Route::post('/edit/{user_id}', [UserController::class, 'postEditUser']);
            Route::get('/delete/{user_id}', [UserController::class, 'getDeleteUser']);
        });
    });


});
