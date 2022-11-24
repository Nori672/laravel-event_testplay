<?php

use App\Http\Controllers\Hello2Controller;
use App\Http\Controllers\Hello3_4Contoroller;
use App\Http\Controllers\hello3Controller;
use App\Http\Controllers\Hello4Contoroller;
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

Route::get('/hello2',[Hello2Controller::class,'index'])->name('hello2')->middleware('MyMW');
Route::get('/hello2/{id}',[Hello2Controller::class,'index']);

Route::get('/hello3',[hello3Controller::class,'index']);
Route::get('/hello3/{id}',[hello3Controller::class,'index']);

Route::get('/hello3_4',[Hello3_4Contoroller::class,'index']);
// Route::get('/hello3_4/{id}/{name}',[Hello3_4Contoroller::class,'save']);
Route::get('/hello3_4/json',[Hello3_4Contoroller::class,'json']);
Route::get('/hello3_4/json/{id}',[Hello3_4Contoroller::class,'json']);

// Route::get('/hello4',[Hello4Contoroller::class,'index']);
// Route::get('/hello4/{user}',[Hello4Contoroller::class,'index']);
Route::get('/hello4',[Hello4Contoroller::class,'index2'])->name('hello4');
Route::get('/hello4_1',[Hello4Contoroller::class,'send'])->name('post');
Route::get('/hello4/event',[Hello4Contoroller::class,'testEvent'])->name('event');