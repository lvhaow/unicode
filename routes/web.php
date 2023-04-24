<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
 Route::get('/', [HomeController::class, 'index'])->name('home');
 Route::get('/san-pham', [HomeController::class, 'products'])->name('product');
 Route::get('them-san-pham', [HomeController::class, 'getAdd']);
 Route::post('them-san-pham', [HomeController::class, 'postAdd']);
 Route::put('them-san-pham', [HomeController::class, 'putAdd']);
 

 Route::get('lay-thong-tin', [HomeController::class, 'getArr']);

 Route::get('demo-response', function (){
   $response = new Response('Hoc Lap Trinh', 200);
   return $response;
 });

 //Nguoi dung
 Route::prefix('users')->name('users.')->group(function(){
    Route::get('/', [UsersController::class, 'index'])->name('index');

    Route::get('/add', [UsersController::class, 'add'])->name('add');

    Route::post('/add', [UsersController::class, 'postAdd'])->name('post-add');

    Route::get('/edit/{id}', [UsersController::class, 'getEdit'])->name('edit');

    Route::post('/update', [UsersController::class, 'postEdit'])->name('post-edit');

    Route::get('/delete/{id}',[UsersController::class, 'delete'])->name('delete');
 });