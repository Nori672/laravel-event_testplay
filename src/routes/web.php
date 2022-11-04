<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\Sample\SampleController;
use App\Http\Middleware\HelloMiddleware;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/hello',[HelloController::class,'index']);
Route::get('/hello/other',[HelloController::class,'other']);
Route::get('/sample',[SampleController::class,'index'])->name('sample');

//正規表現でのルート設定
// Route::get('/hello/{id}',[HelloController::class,'index'])->where('id','[0-9]+');

//ルートのグループ
// Route::middleware([HelloMiddleware::class])->group(function(){
//     Route::get('/hello',[HelloController::class,'index']);
//     Route::get('/hello/other',[HelloController::class,'other']);
// });

//namespaceを使ったグループ
// Route::namespace('Sample')->group(function(){
//     Route::get('/sample',[SampleController::class,'index']);
//     Route::get('/sample/other',[SampleController::class,'other']);
// });

//ルートとモデルの結合
Route::get('hello/{user}',[HelloController::class,'indexModel']);

//Storage
Route::get('/storagetest',[HelloController::class,'indexStorage'])->name('hello');
Route::get('/storagetest/{msg}',[HelloController::class,'otherStorage']);
Route::get('/storageDownload',[HelloController::class,'downloadStorage'])->name('download');
Route::post('/storageUpload',[HelloController::class,'uploadStorage'])->name('upload');