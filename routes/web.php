<?php

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
})->name('welcome');
Route::get('/club_signup', [App\Http\Controllers\HomeController::class, 'club_signup'])->name('club_signup');
Route::get('/athlete_signup', [App\Http\Controllers\HomeController::class, 'athlete_signup'])->name('athlete_signup');
Route::get('/club-profile', [App\Http\Controllers\ClubController::class, 'index'])->name('club_profile');
Route::get('/athlete-profile', [App\Http\Controllers\AthleteController::class, 'index'])->name('athlete_profile');
Route::post('/club-add', [App\Http\Controllers\ClubController::class, 'save'])->name('club_save');
Route::post('/athlete_add', [App\Http\Controllers\AthleteController::class, 'save'])->name('athlete_save');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'setting','middleware' =>'auth',"as"=>"setting."], function () {
    Route::get('/index', [App\Http\Controllers\SettingController::class, 'index'])->name('index');
    Route::get('/club-account', [App\Http\Controllers\AccountController::class, 'club_index'])->name('club_account');
    Route::get('/athlete-account', [App\Http\Controllers\AccountController::class, 'athlete_index'])->name('athlete_account');
    Route::post('/athlete_update', [App\Http\Controllers\AccountController::class, 'AthleteUpdate'])->name('athlete_update');
    Route::post('/club_update', [App\Http\Controllers\AccountController::class, 'ClubUpdate'])->name('club_update');
    Route::get('/password-security', [App\Http\Controllers\PasswordSecurityController::class, 'index'])->name('password_security');
    Route::get('/opration', [App\Http\Controllers\OprationController::class, 'index'])->name('opration');
    Route::post('/opration_save', [App\Http\Controllers\OprationController::class, 'OprationSave'])->name('opration_save');
    Route::post('/account_name', [App\Http\Controllers\PasswordSecurityController::class, 'account_name'])->name('account_name');
    Route::post('/account_phoneno', [App\Http\Controllers\PasswordSecurityController::class, 'account_phoneno'])->name('account_phoneno');
    Route::post('/account_email', [App\Http\Controllers\PasswordSecurityController::class, 'account_email'])->name('account_email');
    Route::post('/account_password', [App\Http\Controllers\PasswordSecurityController::class, 'account_password'])->name('account_password');
});
Route::group(['prefix' => 'rental','middleware' =>'auth',"as"=>"rental."], function () {
    Route::get('/index', [App\Http\Controllers\RentalController::class, 'index'])->name('index');
    Route::get('/add', [App\Http\Controllers\RentalController::class, 'add'])->name('add');
    Route::post('/save', [App\Http\Controllers\RentalController::class, 'save'])->name('save');
    Route::get('/edit/{id}', [App\Http\Controllers\RentalController::class, 'edit'])->name('edit');
    Route::post('/update', [App\Http\Controllers\RentalController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [App\Http\Controllers\RentalController::class, 'delete'])->name('delete');
});
Route::group(['prefix' => 'service','middleware' =>'auth',"as"=>"service."], function () {
    Route::get('/index', [App\Http\Controllers\ServiceController::class, 'index'])->name('index');
    Route::get('/add', [App\Http\Controllers\ServiceController::class, 'add'])->name('add');
    Route::post('/save', [App\Http\Controllers\ServiceController::class, 'save'])->name('save');
    Route::get('/edit/{id}', [App\Http\Controllers\ServiceController::class, 'edit'])->name('edit');
    Route::post('/update', [App\Http\Controllers\ServiceController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [App\Http\Controllers\ServiceController::class, 'delete'])->name('delete');
});
Route::group(['prefix' => 'club','middleware' =>'auth',"as"=>"club."], function () {
    Route::get('/index', [App\Http\Controllers\ClubModuleController::class, 'index'])->name('index');
    Route::get('/detail/{id}', [App\Http\Controllers\ClubModuleController::class, 'detail'])->name('detail');
    Route::post('/save', [App\Http\Controllers\ClubModuleController::class, 'save'])->name('save');
    Route::post('/date', [App\Http\Controllers\ClubModuleController::class, 'date'])->name('date');
    Route::get('/balance', [App\Http\Controllers\ClubModuleController::class, 'balancePage'])->name('balance');
    Route::get('/check_stripe_account', [App\Http\Controllers\ClubModuleController::class, 'checkStripeAccount'])->name('check_stripe_account');
}); 
Route::group(['prefix' => 'roster','middleware' =>'auth',"as"=>"roster."], function () {
    Route::get('/index', [App\Http\Controllers\RosterController::class, 'index'])->name('index');
    Route::get('/detail/{id}', [App\Http\Controllers\RosterController::class, 'detail'])->name('detail');
    Route::post('/date', [App\Http\Controllers\RosterController::class, 'date'])->name('date');
    Route::get('/mail', [App\Http\Controllers\RosterController::class, 'mail'])->name('mail');

});
Route::group(['prefix' => 'member','middleware' =>'auth',"as"=>"member."], function () {
    Route::get('/index', [App\Http\Controllers\MemberController::class, 'index'])->name('index');
    Route::get('/add', [App\Http\Controllers\MemberController::class, 'add'])->name('add');
    Route::get('/edit/{id}', [App\Http\Controllers\MemberController::class, 'edit'])->name('edit');
    Route::post('/save', [App\Http\Controllers\MemberController::class, 'save'])->name('save');
    Route::post('/update', [App\Http\Controllers\MemberController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [App\Http\Controllers\MemberController::class, 'delete'])->name('delete');
    Route::post('/save_card_deatil', [App\Http\Controllers\MemberController::class, 'save_card_deatil'])->name('save_card_deatil');
    Route::post('/update_card_deatil', [App\Http\Controllers\MemberController::class, 'update_card_deatil'])->name('update_card_deatil');
});
Route::group(['prefix' => 'clubcalender','middleware' =>'auth',"as"=>"clubcalender."], function () {
    Route::get('/index', [App\Http\Controllers\ClubCalenderController::class, 'index'])->name('index');
    Route::get('/add/{date}/{time}/{rental}', [App\Http\Controllers\ClubCalenderController::class, 'add'])->name('add');
    Route::post('/save', [App\Http\Controllers\ClubCalenderController::class, 'save'])->name('save');
    Route::get('/edit/{id}', [App\Http\Controllers\ClubCalenderController::class, 'edit'])->name('edit');
    Route::post('/update', [App\Http\Controllers\ClubCalenderController::class, 'update'])->name('update');
    Route::post('/date', [App\Http\Controllers\ClubCalenderController::class, 'date'])->name('date');
    Route::post('/cancle', [App\Http\Controllers\ClubCalenderController::class, 'cancle'])->name('cancle');
    Route::get('/member_calender', [App\Http\Controllers\ClubCalenderController::class, 'member_calender'])->name('member_calender');
    Route::get('/tariner_calender', [App\Http\Controllers\ClubCalenderController::class, 'tariner_calender'])->name('tariner_calender');
});
Route::group(['prefix' => 'trainercalender','middleware' =>'auth',"as"=>"trainercalender."], function () {
    Route::get('/index', [App\Http\Controllers\TrainerClubController::class, 'index'])->name('index');
    Route::get('/detail/{id}', [App\Http\Controllers\TrainerClubController::class, 'detail'])->name('detail');
    Route::post('/date', [App\Http\Controllers\TrainerClubController::class, 'date'])->name('date');
    Route::post('/save', [App\Http\Controllers\TrainerClubController::class, 'save'])->name('save');
    Route::post('/cancle', [App\Http\Controllers\TrainerClubController::class, 'cancle'])->name('cancle');
});
