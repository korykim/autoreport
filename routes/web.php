<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Models\MenuList;
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

Route::get('addUser', [UserController::class,'index']);
Route::get('test', [UserController::class,'test']);
Route::get('cc', [UserController::class,'cc']);
Route::get('dd', [UserController::class,'dd']);
Route::get('adx', [UserController::class,'adx']);
Route::get('op', [UserController::class,'op']);

Route::get('tag', [TagController::class,'index']);

//Route::resource('tags',TagController::class);

Route::group([
    //'prefix' => 'v1',
    'middleware' => ['auth:sanctum', 'verified']
], function () {

    Route::get('/dashboard', function (Request $request) {
        $menuList=MenuList::all();
        return view('dashboard', ['content' => "This is dashboard", 'menuList' => $menuList]);
    })->name('dashboard');

    Route::get('/total', function (Request $request) {
        $menuList=MenuList::all();

        return view('livewire.total', ['content' => "总览", 'menuList' => $menuList]);
    })->name('total');

    Route::get('/buyer', function (Request $request) {
        $menuList=MenuList::all();

        return view('livewire.buyer', ['content' => "国内", 'menuList' => $menuList]);
    })->name('buyer');

    Route::get('/customer', function (Request $request) {
        $menuList=MenuList::all();

        return view('livewire.customer', ['content' => "国外", 'menuList' => $menuList]);
    })->name('customer');

    //Route::get('/post',Posts::class)->name('post');
    //Route::get('/counter',Counter::class)->name('counter');

});
