<?php

use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Product\ProductComponent;
use App\Livewire\Product\AddProductComponent;
use App\Livewire\Product\EditProductComponent;
use App\Livewire\Product\ViewProductComponent;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
    Route::get('products', ProductComponent::class)->name('allProducts');
    Route::get('products/add', AddProductComponent::class)->name('addProducts');
    Route::get('products/view/{id}', ViewProductComponent::class)->name('viewProducts');
    Route::get('products/edit/{id}', EditProductComponent::class)->name('editProducts');
});

Route::get('home', Home::class)->name('home');
Route::get('register', Register::class)->name('registerUsers');
Route::get('login', Login::class)->name('loginUsers');