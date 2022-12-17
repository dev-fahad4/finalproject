<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\adminController;

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



Route::get('/',[App\Http\Controllers\HomePageController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/dashboard/{todoData}', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'showProfile']);

Route::get('/profile/update', [App\Http\Controllers\HomeController::class, 'updateProfile']);

Route::get('/home/addTodoListData', [App\Http\Controllers\HomeController::class, 'addTodoListData']);

Route::get('/home/addTodoListData/doneNremove/{id}/{done}', [App\Http\Controllers\HomeController::class, 'doneNremoveTodoListData']);

Route::get('/admin/showReceptionistList', [App\Http\Controllers\adminController::class, 'recepList']);

Route::get('/admin/showReceptionistCandList', [App\Http\Controllers\adminController::class, 'recepCandList']);

Route::get('/admin/addRecep/{id}', [App\Http\Controllers\adminController::class, 'addRecep']);

Route::get('/admin/removeRecep/{id}', [App\Http\Controllers\adminController::class, 'removeRecep']);

Route::get('/admin/rejectRecepCand/{id}', [App\Http\Controllers\adminController::class, 'rejectRecepCand']);

Route::get('/admin/showDoctorList', [App\Http\Controllers\adminController::class, 'doctorList']);

Route::get('/admin/showDoctorCandList', [App\Http\Controllers\adminController::class, 'doctorCandList']);

Route::get('/admin/addDoctor/{id}', [App\Http\Controllers\adminController::class, 'addDoctor']);

Route::get('/admin/removeDoctor/{id}', [App\Http\Controllers\adminController::class, 'removeDoctor']);

Route::get('/admin/showPatientList', [App\Http\Controllers\adminController::class, 'showPatientList']);

Route::get('/admin/removePatient/{id}', [App\Http\Controllers\adminController::class, 'removePatient']);

Route::get('/admin/rejectDocCand/{id}', [App\Http\Controllers\adminController::class, 'rejectDoctorCand']);

Route::get('/receptionist/showAmbuList/{sortBy}', [App\Http\Controllers\receptionistController::class, 'showAmbuList']);

Route::get('/receptionist/bookAmbulance/{id}/{sortBy}', [App\Http\Controllers\receptionistController::class, 'bookAmbu']);

Route::get('/receptionist/selectPatientforAmbuBooking/{data}/{p_id}/{sortBy}', [App\Http\Controllers\receptionistController::class, 'bookingAmbuDone']);

Route::get('/receptionist/cancelAmbuBook/{id}/{sortBy}', [App\Http\Controllers\receptionistController::class, 'cancelAmbuBook']);

Route::get('/receptionist/showRoomList/{sortBy}', [App\Http\Controllers\receptionistController::class, 'showRoomList']);

Route::get('/receptionist/bookRoom/{id}/{sortBy}', [App\Http\Controllers\receptionistController::class, 'bookRoom']);

Route::get('/receptionist/selectPatientforRoomBooking/{room_id}/{p_id}/{sortBy}', [App\Http\Controllers\receptionistController::class, 'bookingForm']);

Route::get('/receptionist/selectPatientforRoomBooking/bookingForm', [App\Http\Controllers\receptionistController::class, 'bookingRoomDone']);

Route::get('/receptionist/cancelRoomBook/{id}/{sortBy}', [App\Http\Controllers\receptionistController::class, 'cancelRoomBook']);

Route::get('/receptionist/showPatientList', [App\Http\Controllers\receptionistController::class, 'showPatientList']);

Route::get('/pharmacy/showMediList/{sortBy}', [App\Http\Controllers\pharmaciesController::class, 'showMediList']);

Route::get('/pharmacy/addMediToCart', [App\Http\Controllers\pharmaciesController::class, 'addMedi']);

Route::get('/showCart/{sortBy}', [App\Http\Controllers\pharmaciesController::class, 'showCart']);

Route::get('/cart/removeItem/{id}/{sortBy}', [App\Http\Controllers\pharmaciesController::class, 'removeCartItem']);

Route::get('/cart/paymentForm/{total}', [App\Http\Controllers\pharmaciesController::class, 'paymentForm']);

Route::get('/paymentDone', [App\Http\Controllers\pharmaciesController::class, 'paymentDone']);

Route::get('/showAppointmentList/{filterBy}', [App\Http\Controllers\patientController::class, 'showAppointmentList']);

Route::get('/showAppointmentList/book/{id}', [App\Http\Controllers\patientController::class, 'bookAppointment']);

Route::get('/showAppointmentList/cancel/{id}', [App\Http\Controllers\patientController::class, 'cancelAppointment']);

Route::get('/appointment/search', [App\Http\Controllers\patientController::class, 'searchAppointment']);

Route::get('/doctors', [App\Http\Controllers\homePageController::class, 'showDoctors']);

Route::get('/contacts', [App\Http\Controllers\homePageController::class, 'showContacts']);


