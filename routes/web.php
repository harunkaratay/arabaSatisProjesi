<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\isAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    //Admin routes
    Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('adminDashboard');

        //arabaMarkaRoutes
        Route::group(['prefix' => 'carBrand'], function () {
            Route::get('/index', [AdminController::class, 'carBrandIndexPage'])->name('carBrandIndexPage');
            Route::get('/create', [AdminController::class, 'carBrandCreatePage'])->name('carBrandCreatePage');
            Route::post('/add', [AdminController::class, 'carBrandAddPage'])->name('carBrandAdd');
            Route::get('/update/{id}', [AdminController::class, 'carBrandUpdatePage'])->name('carBrandUpdatePage');
            Route::post('/update', [AdminController::class, 'carBrandUpdate'])->name('carBrandUpdate');
        });

    });
    //Satıcı routes
});


//test route
Route::get('/panel/template', function () {
    return view('panel.layout.app');
});
