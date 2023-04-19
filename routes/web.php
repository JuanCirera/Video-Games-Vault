<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\ChangePassword;
use App\Http\Livewire\GameDetails;
use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\SearchUser;
use App\Http\Livewire\UserProfile;
use App\Http\Livewire\UserSettings;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', function (){
	return redirect('home');
});

Route::get('/home', Home::class)->name('home');

Route::get('/register', Register::class)->middleware('guest')->name('register');
Route::post('/register', [Register::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', Login::class)->middleware('guest')->name('login');
Route::post('/login', [Login::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', ResetPassword::class)->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
// Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/users', SearchUser::class)->name("user.search");

Route::group(['middleware' => 'auth'], function () {
	Route::get('/{username}', UserProfile::class)->name('profile');
    Route::get('/games/{game}', GameDetails::class)->name("game.show");
	Route::post('/profile', [UserProfile::class, 'update'])->name('profile.update');
    Route::get('/{username}/settings', UserSettings::class)->name('profile.settings');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [Login::class, 'logout'])->name('logout');
});
