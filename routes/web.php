<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\PublishPostController;

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
    Route::resource('posts', AdminPostController::class)->except('show');
    Route::post('publish/{post}', [PublishPostController::class, 'store'])->name('publish');
});

Route::post('/newsletter', NewsletterController::class);

require __DIR__.'/auth.php';
