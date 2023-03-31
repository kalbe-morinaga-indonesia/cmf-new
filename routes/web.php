<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('lacak',[\App\Http\Controllers\LacakController::class,'index'])->name('lacak.index');

Route::prefix('bs')->middleware('auth')->group(function () {
    Route::get('dashboard',[\App\Http\Controllers\back\DashboardController::class,'index'])->name('dashboard');

    Route::prefix('my-profile')->group(function (){
        Route::get('/',[\App\Http\Controllers\Back\UserController::class,'profile'])
            ->name('profiles.index');
        Route::put('/',[\App\Http\Controllers\Back\UserController::class,'updateProfile'])
            ->name('profiles.update');
    });

    Route::prefix('setting')->group(function (){
        Route::get('/',[\App\Http\Controllers\Back\UserController::class,'setting'])
            ->name('settings.index');
        Route::put('/',[\App\Http\Controllers\Back\UserController::class,'changePassword'])
            ->name('settings.change-password');
    });

    Route::prefix('master')->group(function (){
        Route::resource('divisis', \App\Http\Controllers\back\DivisiController::class);
        Route::resource('departments', \App\Http\Controllers\back\DepartmentController::class);
        Route::resource('subdepartments', \App\Http\Controllers\back\SubdepartmentController::class);
        Route::resource('users', \App\Http\Controllers\back\UserController::class);
    });

    Route::prefix('role-and-permission')->group(function () {
        Route::resource('roles', \App\Http\Controllers\back\RoleController::class);
        Route::resource('permissions', \App\Http\Controllers\back\PermissionController::class);
        Route::resource('assign-permissions', \App\Http\Controllers\back\AssignPermissionController::class);
        Route::resource('assign-users', \App\Http\Controllers\back\AssignUserController::class);
    });

    Route::prefix('cmf')->name('cmf.')->group(function () {
        Route::get('/', [\App\Http\Controllers\CmfController::class,'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\CmfController::class,'create'])->name('create');
        Route::post('/create', [\App\Http\Controllers\CmfController::class,'store'])->name('store');
        Route::get('/{slug}/detail',[\App\Http\Controllers\CmfController::class,'detail'])->name('detail');
        Route::get('/{slug}/review',[\App\Http\Controllers\CmfController::class,'review'])->name('review');
        Route::post('/{slug}/review',[\App\Http\Controllers\CmfController::class,'update'])->name('update');

        Route::prefix('pic')->middleware('role:depthead pic')->group(function () {
            Route::get('/',[\App\Http\Controllers\PicController::class,'index'])->name('pic.index');
            Route::get('/{slug}/verifikasi',[\App\Http\Controllers\PicController::class,'verifikasi'])->name('pic.verifikasi');
            Route::post('/{slug}/verifikasi',[\App\Http\Controllers\PicController::class,'store'])->name('pic.store');
            Route::get('/{slug}/evaluasi',[\App\Http\Controllers\PicController::class,'evaluasi'])->name('pic.evaluasi');
            Route::post('/{slug}/evaluasi',[\App\Http\Controllers\PicController::class,'update'])->name('pic.update');
        });

        Route::prefix('depthead')->middleware('role:depthead')->group(function () {
            Route::get('/',[\App\Http\Controllers\back\DeptController::class,'index'])->name('dept.index');
            Route::get('/{slug}/verifikasi',[\App\Http\Controllers\back\DeptController::class,'verifikasi'])->name('dept.verifikasi');
            Route::post('/{slug}/verifikasi',[\App\Http\Controllers\back\DeptController::class,'store'])->name('dept.store');
            Route::get('/{slug}/evaluasi',[\App\Http\Controllers\back\DeptController::class,'evaluasi'])->name('dept.evaluasi');
            Route::post('/{slug}/evaluasi',[\App\Http\Controllers\back\DeptController::class,'update'])->name('dept.update');
        });

        Route::prefix('svp')->middleware('role:svp system')->group(function () {
            Route::get('/',[\App\Http\Controllers\back\SvpController::class,'index'])->name('svp.index');
            Route::get('/{slug}/verifikasi',[\App\Http\Controllers\back\SvpController::class,'verifikasi'])->name('svp.verifikasi');
            Route::post('/{slug}/verifikasi',[\App\Http\Controllers\back\SvpController::class,'store'])->name('svp.store');
        });

        Route::prefix('mnf')->middleware('role:mnf')->group(function () {
            Route::get('/',[\App\Http\Controllers\back\MnfController::class,'index'])->name('mnf.index');
            Route::get('/{slug}/verifikasi',[\App\Http\Controllers\back\MnfController::class,'verifikasi'])->name('mnf.verifikasi');
            Route::post('/{slug}/verifikasi',[\App\Http\Controllers\back\MnfController::class,'store'])->name('mnf.store');
        });

        Route::prefix('mr')->middleware('role:mr & food safety team')->group(function () {
            Route::get('/',[\App\Http\Controllers\back\MrController::class,'index'])->name('mr.index');
            Route::get('/{slug}/verifikasi',[\App\Http\Controllers\back\MrController::class,'verifikasi'])->name('mr.verifikasi');
            Route::post('/{slug}/verifikasi',[\App\Http\Controllers\back\MrController::class,'store'])->name('mr.store');
            Route::get('/{slug}/evaluasi',[\App\Http\Controllers\back\MrController::class,'evaluasi'])->name('mr.evaluasi');
            Route::post('/{slug}/evaluasi',[\App\Http\Controllers\back\MrController::class,'update'])->name('mr.update');
        });

        Route::prefix('dc')->middleware('role:document control')->group(function () {
            Route::get('/',[\App\Http\Controllers\back\DocumentControlController::class,'index'])->name('dc.index');
            Route::get('/{slug}/verifikasi',[\App\Http\Controllers\back\DocumentControlController::class,'verifikasi'])->name('dc.verifikasi');
            Route::post('/{slug}/verifikasi',[\App\Http\Controllers\back\DocumentControlController::class,'store'])->name('dc.store');
            Route::get('/{slug}/print',[\App\Http\Controllers\back\DocumentControlController::class,'print'])->name('dc.print');
        });
    });
});
