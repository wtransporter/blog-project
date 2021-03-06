<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\PublishPostController;
use App\Http\Controllers\ToggleAdminController;

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
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('bookmarks', [BookmarkController::class, 'index'])->name('bookmarks')->middleware('auth');
Route::post('bookmarks/{post}', [BookmarkController::class, 'store'])->name('bookmarks.store')->middleware('auth');

Route::get('followers', [FollowerController::class, 'index'])->name('followers.index')->middleware('auth');
Route::post('followers/{user}', [FollowerController::class, 'store'])->name('followers.store')->middleware('auth');

Route::get('profile/{user:username}/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::patch('profile/{user}', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::group(['middleware' => ['auth', 'is_admin'], 'prefix' => 'admin'], function() {
    Route::resource('posts', AdminPostController::class)->except('show');
    Route::post('publish/{post}', [PublishPostController::class, 'store'])->name('publish');
    Route::resource('categories', CategoryController::class)->except('show');

    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::delete('profile/{user}', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('permission/{user}', [ToggleAdminController::class, 'store'])->name('permission');
});

Route::post('/newsletter', NewsletterController::class);

require __DIR__.'/auth.php';
