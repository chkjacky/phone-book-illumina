<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PhoneBookController;
use App\Http\Controllers\ProfileController;
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
    return view('index');
});

Route::post('/auth/signup', [AuthController::class, 'signUp']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware(['redirect.page'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin']);
    Route::get('/register', [AuthController::class, 'showSignUp']);
});

Route::middleware(['verify.loggedIn'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/menu', [MenuController::class, 'showMenu']);

    Route::get('/add', [PhoneBookController::class, 'showAddContact']);
    Route::post('/create-contact', [PhoneBookController::class, 'createContact']);
    Route::get('/contacts', [PhoneBookController::class, 'showContact']);

    Route::get('/contact/{contactId}', [PhoneBookController::class, 'showViewContact']);
    Route::get('/delete/{contactId}', [PhoneBookController::class, 'deleteContact']);

    Route::get('/edit/{contactId}', [PhoneBookController::class, 'showEditContact']);
    Route::post('/update-contact', [PhoneBookController::class, 'updateContact']);

    Route::get('/failed', function () {
        return view('failed');
    });

    Route::get('/profile', [ProfileController::class, 'showProfile']);
    Route::post('/profile/update', [ProfileController::class, 'editProfile']);
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
