<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChangePassword;
use App\Http\Livewire\AboutUs;
use App\Http\Livewire\AdminDashboard;
use App\Http\Livewire\Contact;
use App\Http\Livewire\GameDetails;
use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\SearchUser;
use App\Http\Livewire\UserProfile;
use App\Http\Livewire\UserSettings;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

// ** GOOGLE AUTH **
Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
})->name('login-google');

Route::get('/google-callback', function () {

    $user = Socialite::driver('google')->user();

    $userExists=User::where('external_id',$user->id)->where('external_auth','google')->first();

    if($userExists){
        Auth::login($userExists);
    }else{
        $newUser=User::create([
            "username" => $user->name,
            "email" => $user->email,
            "avatar" => $user->avatar,
            "external_id" => $user->id,
            "external_auth" => "google"
        ])->assignRole('external_user');

        Auth::login($newUser);
    }

    return redirect('home');

});
//

// ** FACEBOOK AUTH **
Route::get('/login-facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('login-facebook');

Route::get('/facebook-callback', function () {

    $user = Socialite::driver('facebook')->user();

    $userExists=User::where('external_id',$user->id)->where('external_auth','facebook')->first();

    if($userExists){
        Auth::login($userExists);
    }else{
        $newUser=User::create([
            "username" => $user->name,
            "email" => $user->email,
            "avatar" => $user->avatar,
            "external_id" => $user->id,
            "external_auth" => "facebook"
        ])->assignRole('external_user');

        Auth::login($newUser);
    }

    return redirect('home');

});
//

Route::get('/register', Register::class)->middleware('guest')->name('register');
Route::post('/register', [Register::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', Login::class)->middleware('guest')->name('login');
Route::post('/login', [Login::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', ResetPassword::class)->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/users', SearchUser::class)->name("user.search");
Route::get('/contact', Contact::class)->name('contact');
Route::get('/about', AboutUs::class)->name('about');
Route::get('/games/{game}', GameDetails::class)->name("game.show");

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/admin/dashboard', AdminDashboard::class)->name('dashboard');
    });
	Route::get('/profile/{username}', UserProfile::class)->name('profile.show');
    Route::get('/profile/settings/{username}', UserSettings::class)->name('profile.settings');
	Route::post('logout', [Login::class, 'logout'])->name('logout');
});
