<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CheckupController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLogController;
use App\Http\Controllers\KonsultasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;

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


Route::group(['middleware' => 'auth'], function () {
	Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);


	Route::group(['middleware' => 'role:admin'], function() {
		Route::get('/adminDashboard',
		[HomeController::class, "index"]
		)->name('adminDashboard');

		Route::get('user-management',
		[UserController::class, "index"]
		)->name('user-management');
		Route::get('user-management/add', function () {
			return view('laravel-examples/user-add');
		})->name('user-add');

		Route::get('activity', 
		[UserLogController::class, "index"]
		)->name('log-activity');

		// CheckupController
		Route::get('antrian',
		[AntrianController::class, "index"])
		->name('antrian');
		Route::get('antrian/{id}',
		[AntrianController::class, "show"])
		->name('antrian-detail');
		Route::get('antrian-del/{id}', 
		[AntrianController::class, "destroy"]
		)->name('antrian-delete');

		Route::get('checkup-history',
		[CheckupController::class, "index"])
		->name('history');
		Route::get('checkup-history/{id}',
		[CheckupController::class, "show"])
		->name('checkup-history-show');
		Route::post('checkup-history/{id}',
		[CheckupController::class, "store"])
		->name('checkup-history-store');
		Route::patch('checkup-history/{id}',
		[CheckupController::class, "update"])
		->name('checkup-history-update');

	});



	Route::group(['middleware' => 'role:user'], function() {
		Route::get('/userDashboard', function () {
			return view('welcome');
		})->name('userDashboard');

		Route::get('checkup',
		[AntrianController::class, 'index_user'])
		->name('checkup-register');
		Route::get('checkup/log',
		[CheckupController::class, 'log'])
		->name('checkup-log');
		Route::get('checkup/{id}',
		[CheckupController::class, 'show'])
		->name('checkup-log-show');
	});

	

	Route::get('conversation', function () {
		return view('conversation');
	})->name('conversation');

	// antrian user dan admin
	Route::get('antrian-daftar', function () {
		return view('antrian-daftar');
	})->name('antrian-register');
	Route::post('antrian',
	[AntrianController::class, "store"])
	->name('antrian-store');
	Route::get('antrian-konsultasi', function () {
		return view('antrian-konsul');
	})->name('antrian-konsultasi');
	Route::post('antrian-konsultasi',
	[KonsultasiController::class, "store"]
	)->name('antrian-konsultasi-store');
	Route::get('antrian-konsultasi/{id}',
	[KonsultasiController::class, "destroy"]
	)->name('antrian-konsultasi-delete');
	Route::patch('antrian-konsultasi/{id}',
	[KonsultasiController::class, "patch"]
	)->name('antrian-konsultasi-patch');

	Route::get('card/{id}',
	[AntrianController::class, "card"])
	->name('card');
	Route::get('card-k/{id}',
	[AntrianController::class, "card"])
	->name('card');

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', 
	[HomeController::class, "index"]
	)->name('dashboard');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

  //   Route::get('virtual-reality', function () {
	// 	return view('virtual-reality');
	// })->name('virtual-reality');

  //   Route::get('static-sign-in', function () {
	// 	return view('static-sign-in');
	// })->name('sign-in');

  //   Route::get('static-sign-up', function () {
	// 	return view('static-sign-up');
	// })->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy'])
		->name('logout');
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');