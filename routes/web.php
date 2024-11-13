<?php

//use App\Http\Controllers\CarController;
//use App\Http\Controllers\ProductController;
//use App\Http\Controllers\ShowCarController;
//use \App\Http\Controllers\MathController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/signup', [SignupController::class,'create'])->name('signup');
Route::get('/login', [LoginController::class,'create'])->name('login');

//Route::get('/hello/{firstname}/{lastname}', [\App\Http\Controllers\HelloController::class,'welcome']);





//Route::get('/', function () {
//    $person = [
//        "name" => "Gumiho",
//        "email" => "gumiho@gmail.com",
//    ];
//    //dd($person);
//    ///debug
//    dump($person);
//    return view('welcome');
//});


//Route::get('/about', function () {
//    return view('about');
//});


// render blade view
//Route::view('/about','about')->name('about');

// @PathVariable
//Route::get('/product/{id}',function (string $id){
//return "Product id: $id";
//})->whereNumber('id');

// @RequestParam
//Route::get('/products/{category?}',function (string $category = null){
//    return "Category: $category";
//});

//Route::get('/user/{username}',function (string $username){
//    return "username: $username";
//})->where(['username' => '[a-z]+']);

//Route::get('{lang}/product/{id}',function (string $lang, string $id){
//    return "Product id: $id Language: $lang";
//})->where(['lang' => '[a-z]{2}', 'id' => '\d{4,}']);


//Route::get('/search/{search}',function (string $search){
//    return "Search: $search";
//})->where('search', '.+');


// Rout Name
//Route::get('/user/profile',function (){})->name('profile');

//Route::get('/current-user',function (){
//    return to_route('profile');
//})->name('user.current');



// route group
//Route::prefix('admin')->group(function(){
//    Route::get('/users',function (){
//        return '/admin/users';
//    });
//});

//Route::namespace('admin')->group(function(){
//    Route::get('/users',function (){
//        return 'users'; // but the route name is "admin.users"
//    })->name('users');
//});

//fallback excute every time url not match
//Route::fallback(function(){
//    return 'fallback';
//});
//
//Route::get('/sum/{first}/{second}/{third}', function ($first, $second, $third){
//    return $first + $second + $third;
//})->whereNumber(['first', 'second', 'third']);




//Route::controller(CarController::class)->group(function(){
//    Route::get('/cars', 'index')->name('cars.index');
//
//});

//Route::resource('products', ProductController::class);

//Route::resource('products', ProductController::class);
//->except(['show']);  //if we don't want to specify method
//->only(['index','show'])  // only define 2 method from product controller




//Route::apiResource([
//    'products', ProductController::class,
//        'cars' ,CarController::class
//    ]
//);


