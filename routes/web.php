<?php

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


Route::get('/about', function () {
    return view('website\about');
});

use App\Http\Controllers\PostController;
Route::resource('post', PostController::class);
Route::get('/', [PostController::class, 'frontpage'])->name('/');
Route::get('/article/{id}', [PostController::class, 'index'])->name('article');
Route::get('/ed/{id}', [PostController::class, 'ed']);
Route::get('new', [PostController::class, 'create'])->name('new');
Route::post('tambah-post', [PostController::class, 'store'])->name('tambah-post');
Route::get('allpost', [PostController::class, 'list'])->name('allpost');
Route::get('/post/hapus/{id}', [PostController::class, 'destroy']);
Route::put('/post/update/{id}', [PostController::class, 'update']);
Route::get('/post/kategori/{id}', [PostController::class, 'kat']);
Route::get('/adopsi', [PostController::class, 'adopsi']);
Route::get('/cat/{id}', [PostController::class, 'cat']);
Route::get('/singlepost/cari', [PostController::class, 'cari']);
Route::get('cari', [PostController::class, 'cariAdmin']);
use App\Http\Controllers\CommentController;
Route::post('/post/{post}/comment', [CommentController::class, 'store'])->name('post.comment.store');
use App\Http\Controllers\AdoptController;
Route::post('/cat/{post}/adopt', [AdoptController::class, 'store'])->name('cat.adopt.store');
Route::get('/adoptlist', [AdoptController::class, 'list'])->name('adopt-list');
Route::get('/adoptconfirmlist', [AdoptController::class, 'index'])->name('adopt-confirm');
Route::get('/adopt/{id}', [AdoptController::class, 'show']);
Route::get('/adopt/edit/{id}', [AdoptController::class, 'edit']);
Route::get('/adopt/tolak/{id}', [AdoptController::class, 'tolak']);
Route::get('/adoptconfirmed', [AdoptController::class, 'confirmed'])->name('adopt-confirm-list');


Route::get('/article', function () {
    return view('website\article');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('status');

Route::get('/logout', function()
{
    auth()->logout();
    session()->flush();
    return Redirect::to('/');
})->name('keluar');
