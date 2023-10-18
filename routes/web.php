<?php

use App\Http\Controllers\PartnerController;
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

Route::get('/', [PartnerController::class,'index']);
Route::get('verify', function () {
    return view('verify');
  });
Route::get('/verify/{token}',[PartnerController::class, 'verify']);

Route::post('/submit-form', [PartnerController::class, 'submitForm'])->name('submit-form');
Route::post('/verify-vendor', [PartnerController::class, 'verifyVendor'])->name('verify-vendor');

Route::view('/mail' , 'emails/to_partner_mail');
