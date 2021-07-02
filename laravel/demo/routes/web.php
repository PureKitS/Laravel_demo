<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
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

//定义显示客户信息路由 使用show功能类
Route::get('/dashboard', [CustomerController::class, 'show'], function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



//创建customer路由组管理路由
Route::prefix('customer')->middleware('auth')->group(function(){
   
//定义搜索客户信息路由
Route::post('search', [CustomerController::class, 'search'],function(){
    return view('dashboard');    
})->name('customer.search');
 
//定义插入添加客户信息路由
Route::post('insert',[CustomerController::class, 'insert'])->name('customer.insert');

 //定义添加客户信息路由
Route::get('add', [CustomerController::class, 'add'])->name('add');
       
//定义修改用户数据
Route::get('edit/{customer_id}', [CustomerController::class, 'edit'])->name('edit');

//定义删除用户数据
Route::get('delete/{customer_id}',[Customercontroller::class,'delete'],function(){
    return view('delete');
})->name('delete');

//定义删除界面的确定删除按钮
Route::post('confirmDelete/{customer_id}', [CustomerController::class, 'confirmDelete'])->name('confirmDelete');


//定义更新客户信息路由
Route::post('update', [CustomerController::class, 'update'])->name('update');

});


 


 




