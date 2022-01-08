<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;

use Illuminate\Support\Facilities\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/home/search', [HomeController::class, 'search']);
Route::post('/home/search', [HomeController::class, 'searchProcess']);
Route::get('/home/aboutus', [HomeController::class, 'aboutus']);
Route::get('/home/doctor/{id}', [HomeController::class, 'doctorProfile']);
Route::get('/home/doctor/registervisit/{id}', [HomeController::class, 'RegisterVisit']);
Route::post('/home/doctor/registervisitProcess/{id}', [HomeController::class, 'RegisterVisitProcess']);

Route::get('login', [LoginController::class, 'Index']);
Route::post('login', [LoginController::class, 'Check']);
Route::get('logout', [LoginController::class, 'Destroy']);
Route::get('dashboard/deleteaccount', [LoginController::class, 'RemoveProfile']);
Route::get('dashboard/deleteaccountYES', [LoginController::class, 'RemoveProfileProces']);



Route::get('login/register', [RegisterController::class, 'Register']);
Route::post('login/createUser', [RegisterController::class, 'CreateUser']);
Route::post('login/createDoctor', [RegisterController::class, 'CreateDoctor']);


Route::get('dashboardhandle', [LoginController::class, 'CheckRole']);

Route::get('dashboard/user/handle', [UserController::class, 'DashboardHandle']);
Route::get('dashboard/user', [UserController::class, 'Dashboard']);
Route::get('dashboard/user/editprofile', [UserController::class, 'EditProfile']);
Route::post('dashboard/user/editprofileprocess', [UserController::class, 'EditProfileProcess']);
Route::get('dashboard/user/myvisits', [UserController::class, 'Visits']);
Route::get('dashboard/user/ratedoctor', [UserController::class, 'Ratedoctor']);
Route::post('dashboard/user/rateDoctorProcess/{id}', [UserController::class, 'RateDoctorProcess']);



Route::get('dashboard/admin', [AdminController::class, 'Dashboard']);
Route::get('dashboard/admin/editprofile', [AdminController::class, 'EditProfile']);
Route::get('dashboard/admin/handle', [AdminController::class, 'DashboardHandle']);
Route::get('dashboard/admin/makeadmin', [AdminController::class, 'Makeadmin']);
Route::get('dashboard/admin/makeadminprocess/{id}', [AdminController::class, 'MakeAdminProcess']);


Route::get('dashboard/doctor', [DoctorController::class, 'Dashboard']);
Route::get('dashboard/doctor/editprofile', [DoctorController::class, 'EditProfile']);
Route::post('dashboard/doctor/editprofileprocess', [DoctorController::class, 'EditProfileProcess']);
Route::get('dashboard/doctor/myvisits', [DoctorController::class, 'Visits']);
Route::get('dashboard/doctor/handle', [DoctorController::class, 'DashboardHandle']);