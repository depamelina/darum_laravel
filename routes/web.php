<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentrePointController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LoginController;


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

Route::get('/', function () {
    return view('login');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/map',[App\Http\Controllers\MapController::class,'index'])->name('map.index');
Route::get('/space/data',[App\Http\Controllers\DataController::class,'spaces'])->name('space');
Route::get('/space',[App\Http\Controllers\SpaceController::class,'index'])->name('space.index')->middleware('auth');
Route::get('/space/print',[App\Http\Controllers\SpaceController::class,'print'])->name('space.print')->middleware('auth');
Route::get('/space/create',[App\Http\Controllers\SpaceController::class,'create'])->name('space.create')->middleware('auth');
Route::post('/space/store',[App\Http\Controllers\SpaceController::class,'store'])->name('space.store');
Route::get('/space/show/{id}',[App\Http\Controllers\SpaceController::class, 'show'])->name('space.edit')->middleware('auth');
Route::post('/space/update/{id}',[App\Http\Controllers\SpaceController::class, 'update'])->name('space.update');

Route::get('/exportexcel',[SpaceController::class, 'exportdata'])->name('exportdata');

Route::get('/space/destroy/{id}',[App\Http\Controllers\SpaceController::class,'destroy'])->name('space.destroy');

Route::get('/map/{slug}',[App\Http\Controllers\MapController::class,'show'])->name('map.show');

Route::resource('centre-point',(CentrePointController::class))->middleware('auth');
Route::resource('spaces',(SpaceController::class));

Route::get('/centrepoint/data',[DataController::class,'centrepoint'])->name('centre-point.data');
Route::get('/spaces/data',[DataController::class,'spaces'])->name('data-space');

Route::get('/categories/data',[DataController::class,'categories'])->name('data-category');

Route::get('/city', [App\Http\Controllers\CityController::class, 'index'])->name('city.index')->middleware('auth');
Route::post('/addcity',[CityController::class, 'addcity'])->name('city.add')->middleware('auth');
Route::get('/showcity/{id}',[CityController::class, 'update'])->name('city.show');
Route::post('/updatedata/{id}',[CityController::class, 'edit'])->name('city.update');
Route::get('/delete/{id}',[CityController::class, 'delete'])->name('city.delete');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser',[LoginController::class, 'registeruser'])->name('registeruser');

