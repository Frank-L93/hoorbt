<?php

use App\Http\Controllers\ToernooiPartijController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LadderPartijController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;

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
Route::get('/ladderpartijen', function () {
    return view('ladderpartij');
})->middleware(['auth'])->name('ladder');
Route::get('/dashboard', [Controller::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/historie', [Controller::class, 'historie'])->middleware(['auth'])->name('historie');
Route::get('/uitleg', [Controller::class, 'uitleg'])->middleware(['auth'])->name('uitleg');
Route::get('/uitleg/gast', [Controller::class, 'gast'])->name('uitleg2');
Route::post('/ladderpartij', [LadderPartijController::class, 'store'])->middleware(['auth'])->name('ladderpartij');
Route::post('/toernooipartij', [AdminController::class, 'store'])->middleware(['auth'])->name('toernooipartij');
Route::post('/uitslagdoorgeven', [ToernooiPartijController::class, 'store'])->middleware(['auth'])->name('uitslag');
Route::get('/admin', [AdminController::class, 'index'])->middleware(['role:super-admin'])->name('admin');
Route::get('/speler/{name}', [Controller::class, 'speler'])->middleware(['role:super-admin|Toernooispeler'])->name('speler');
require __DIR__.'/auth.php';
