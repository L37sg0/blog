<?php

use App\Http\Controllers\PostsController;
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

//Route::Auth;
/*
Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => '/posts', 'as' => 'posts.'], function () {
        Route::get('/', [PostsController::class, 'index'])->name('posts');
        Route::get('/new', [PostsController::class, 'create'])->name('new');
        Route::post('/save', [PostsController::class, 'store'])->name('save');
        Route::get('/view/{id}', [PostsController::class, 'show'])->name('view');
        Route::get('/edit/{post_id}', [PostsController::class, 'edit'])->name('edit');
        Route::get('/delete/{post_id}', [PostsController::class, 'delete'])->name('delete');
    });
});*/

