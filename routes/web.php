<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\MailController;
//use App\Http\Middleware\UserAuth;
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

// Route::get('/', function () {
//     return view('welcome');
// });


//mail sent
// Route::view('/contact','contactform')->name('contactform');
// Route::post('/send',[MailController::class,'send'])->name('send.email');


Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});
Route::get('/registration', function () {
    return view('register');
}); 
Route::get('/', function () {
    return view('home');
});
// Route::get('search',function (){
//     return view('search');
// });

Route::post('/login',[Usercontroller::class,'login']);
Route::get('/product',[Productcontroller::class,'index'])->name('product.page')->middleware('islogin');
//Route::get('/logout',[Productcontroller::class,'logout']);
Route::post('/registration',[Usercontroller::class,'register']);
Route::get('/detail/{id}',[Productcontroller::class,'detail']);
    Route::get('search',[Productcontroller::class,'Search']);
Route::post('/add_to_cart',[Productcontroller::class,'addtocart']);
Route::get('/cartlist',[Productcontroller::class,'cartList'])->middleware('islogin');
Route::get('/removecart/{id}',[Productcontroller::class,'removeCart']);
Route::get('/ordernow',[Productcontroller::class,'orderNow']);
Route::post('/orderplace',[Productcontroller::class,'orderPlace']);
Route::get('/orderhistory',[Productcontroller::class,'orderHistory'])->middleware('islogin');




