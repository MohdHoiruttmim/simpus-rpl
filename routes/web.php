<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CheckupController;
use App\Http\Controllers\AntrianController;
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
		Route::get('/adminDashboard', function () {
			return view('dashboard');
		})->name('adminDashboard');

		Route::get('user-management', function () {
			return view('laravel-examples/user-management');
		})->name('user-management');
		Route::get('user-management/add', function () {
			return view('laravel-examples/user-add');
		})->name('user-add');

		Route::get('billing', function () {
			return view('billing');
		})->name('billing');

		// CheckupController
		Route::get('antrian',
		[AntrianController::class, "index"])
		->name('antrian');

		Route::get('antrian/{id}',
		[AntrianController::class, "show"])
		->name('antrian-detail');

		Route::get('history', function () {
			return view('history');
		})->name('history');
		Route::get('history/{id}', function () {
			return view('history-detail');
		})->name('history-detail');
	});



	Route::group(['middleware' => 'role:user'], function() {
		Route::get('/userDashboard', function () {
			return view('welcome');
		})->name('userDashboard');

		// Route::get('checkup', function () {
		// 	return view('checkup-register');
		// })->name('checkup-register');
		Route::get('checkup', [AntrianController::class, 'index_user'])->name('checkup-register');
	});

	Route::get('conversation', function () {
		return view('conversation');
	})->name('conversation');

	// antrian user dan admin
	Route::get('antrian-daftar', function () {
		return view('antrian-daftar');
	})->name('antrian-register');
	Route::post('antrian',
	[AntrianController::class, "store"])->name('antrian-store');

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

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

    Route::get('/logout', [SessionsController::class, 'destroy']);
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