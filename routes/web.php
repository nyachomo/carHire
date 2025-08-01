<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MyProfileController;
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

use Illuminate\Support\Facades\Auth;
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/addUser', [UserController::class, 'adminAddUser'])->name('adminAddUser');
Route::post('/updateUser', [UserController::class, 'adminUpdateUser'])->name('adminUpdateUser');
Route::post('/deleteUser', [UserController::class, 'adminDeleteUser'])->name('adminDeleteUser');
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::post('/addCar', [CarController::class, 'adminAddCar'])->name('adminAddCar');
Route::post('/updateCar', [CarController::class, 'adminUpdateCar'])->name('adminUpdateCar');
Route::post('/deleteCar', [CarController::class, 'adminDeleteCar'])->name('adminDeleteCar');
Route::post('/searchCar', [CarController::class, 'searchCar'])->name('searchCar.index');
Route::resource('car-models', CarModelController::class);
Route::get('/myProfile', [MyProfileController::class, 'profile'])->name('profile.index');
Route::post('/myProfile/update', [MyProfileController::class, 'updateProfile'])->name('profile.update');
Route::get('/customerRegistration', [UserController::class, 'customerRegistration'])->name('customerRegistration');
Route::get('/carDetails', [CarController::class, 'carDetails'])->name('carDetails');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/adminDashboard', [UserController::class, 'adminDashboard'])->name('adminDashboard');

// Route to file download
Route::get('/download-file/{filename}', [App\Http\Controllers\UserController::class, 'downloadFile'])->name('downloadFile');
// Route to upload file
Route::post('/upload-file', [App\Http\Controllers\UserController::class, 'uploadFile'])->name('uploadFile');
Route::get('/', [CarController::class, 'welcome'])->name('welcome');



Route::post('/bookCarPerDay', [BookingController::class, 'bookCarPerDay'])->name('bookCarPerDay');

Route::get('/customerBookings', [BookingController::class, 'customerBookings'])->name('customerBookings');