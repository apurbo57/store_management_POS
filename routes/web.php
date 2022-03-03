<?php

use App\Http\Controllers\staff\DashboardController;
use App\Http\Controllers\staff\sellController;
use App\Http\Controllers\testController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return redirect('/staff/login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/test',[testController::class, 'index']);
Route::post('/test',[testController::class, 'get_data'])->name('get_data');

Route::get('/get/product/{id}',[sellController::class,'getProduct']);
Route::post('product/sell',[sellController::class,'productSell'])->name('productSell');

require __DIR__.'/auth.php';
require __DIR__.'/backend.php';
