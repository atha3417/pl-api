<?php

use App\Http\Controllers\v1\LanguageController as PL1;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect(url('/admin/pl'));
    });

    Route::prefix('pl')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::post('/', [AdminController::class, 'store']);
        Route::get('/create', [AdminController::class, 'create']);
        Route::get('/{name}', [AdminController::class, 'show']);
        Route::put('/{name}', [AdminController::class, 'update']);
        Route::delete('/{name}', [AdminController::class, 'destroy']);
        Route::get('/{name}/edit', [AdminController::class, 'edit']);
        Route::put('/{name}/update', [AdminController::class, 'update']);
    });
});

Route::prefix('api')->group(function () {
    Route::get('/', function () {
        return redirect(url('/api/'. env('API_CURRENT_VERSION') .'/pl'));
    });

    Route::prefix('v1')->group(function () {
        Route::get('/', function () {
            return redirect(url('/api/v1/pl'));
        });

        Route::prefix('pl')->group(function () {
            Route::get('/', [PL1::class, 'all']);
            Route::get('/{name}', [PL1::class, 'detail']);
            Route::get('/{name}/versions', [PL1::class, 'version']);
        });
    });
});
