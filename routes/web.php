<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\multipicController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\AboutController;
use app\Models\User;
use Illuminate\Support\Facades\DB;

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
    $brands = DB::table('brands')->get();
   $images = DB::table('multipics')->get();
    return view('home', compact('brands','images'));
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/home', function () {
    
    echo 'home';
});

Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);

Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);

Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);

Route::get('/pdelete/category/{id}', [CategoryController::class, 'PDelete']);

Route::post('/category/update/{id}', [CategoryController::class, 'Update']);

Route::get('/contact', [ContactController::class, 'index'])->middleware('check')->name('con');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
   //$users = User::all();
  // $users = DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');

Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.Brand');

Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');

Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);

Route::post('/brand/update/{id}', [BrandController::class, 'Update']);

Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);


Route::get('/multipic/all', [multipicController::class, 'multi'])->name('multi.image');

Route::post('/multipic/add', [multipicController::class, 'StoreImage'])->name('store.image');


Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');

Route::get('/sliders/all', [SlidersController::class, 'AllSliders'])->name('home.sliders');

Route::post('/sliders/add', [SlidersController::class, 'AddSlider'])->name('store.sliders');

Route::get('/sliders/edit/{id}', [SlidersController::class, 'Edit']);

Route::post('/sliders/update/{id}', [SlidersController::class, 'Update']);

Route::get('/sliders/delete/{id}', [SlidersController::class, 'Delete']);

Route::get('/admin/about/all', [AboutController::class, 'AllAbout'])->name('home.about');

Route::post('/admin/about/add', [AboutController::class, 'Add'])->name('store.about');

Route::get('/admin/about/edit/{id}', [AboutController::class, 'Edit']);

Route::post('/admin/about/update/{id}', [AboutController::class, 'Update']);

Route::get('/admin/about/delete/{id}', [AboutController::class, 'Delete']);

Route::get('/admin/contact/all', [ContactController::class, 'AllContact'])->name('all.Contact');