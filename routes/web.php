<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\Admin\AdminPostController;

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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::group(['middleware' => 'is_admin', 'prefix' => 'admin'], function() {
    Route::get('posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
    Route::get('posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
    Route::get('posts/{post}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
    Route::post('posts', [AdminPostController::class, 'store'])->name('admin.posts.store');
});

Route::post('/newsletter', NewsletterController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
