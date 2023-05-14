<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Orchid\Screens\Client\ClientListScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

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

Route::get('/', [PostController::class,'sport'])->name('postsSport');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::screen('client', ClientListScreen::class)->name('client')->breadcrumbs(function (Trail $trail) {
    return $trail
        ->parent('platform.index')
        ->push('Клиент');
});

Route::get('/animal', [PostController::class,'animal'])->name('postsAnimal');
Route::get('/sport', [PostController::class,'sport'])->name('postsSport');
Route::get('/cosmos', [PostController::class,'cosmos'])->name('postsCosmos');
Route::get('/usa', [PostController::class,'usa'])->name('postsUsa');
Route::get('/it', [PostController::class,'it'])->name('postsIt');
Route::get('/posts/{post}', [PostController::class,'show'])->name('post.show');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


Route::post('post.store', [PostController::class, 'store'])->name('posts.store');
