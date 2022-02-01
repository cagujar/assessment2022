<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\account;
use App\Http\Controllers\userManagement;
use App\Http\Controllers\FormController;
use App\Http\Controllers\listofUserOrders;
use App\Models\User;


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

//navigate to the welcome.blade
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//navigate to the contacts.blade
Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/technology-stack', function () {
    return view('technologyStack');
})->name('technologyStack');


//navigate to the listoforders.blade
// Route::get('/list-of-orders', function () {
//     return view('listoforders');
// })->middleware(['auth'])->name('listoforders');

//navigate to the menu.blade
Route::get('/menu', function () {
    return view('menu');
})->name('menu');



//navigate to the dashboard.blade
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

//get data from getAllForm
Route::get('/dashboard',[userManagement::class,'getUser'])->middleware(['auth'])->name('dashboard');

//send data to update email function
Route::post('/email-Update', [account::class,'updateEmail'])->name('emailUpdate');

//send data to update info function
Route::post('/info-Update', [account::class,'updateInfo'])->name('infoUpdate');

//send data to update password function
Route::post('/password-Update', [account::class,'updatePassword'])->name('passwordUpdate');

//get data from acceptUser
Route::get('acceptUser/{id}',[userManagement::class,'acceptUser'])->name('acceptUser');

//get data from rejectUser
Route::get('rejectUser/{id}',[userManagement::class,'rejectUser'])->name('rejectUser');

//get data from index
Route::get('/form',[FormController::class,'index'])->middleware(['auth','role:Admin'])->name('form');

//send data to form-data
Route::post('/form-data',[FormController::class,'store'])->middleware(['auth','role:Guest'])->name('form-data');

//route to view the user specific form
Route::get('/form-view/{form}',[listOfUserOrders::class,'show'])->middleware(['auth','role:Admin'])->name('form-view');

//get data from listapplicant with auth
Route::get('/listoforder',[listOfUserOrders::class,'orderList'])->middleware(['auth','role:Admin'])->name('listoforders');

//get data from users order
Route::get('/order/delivered/{form}',[listOfUserOrders::class,'acceptOrder'])->middleware(['auth'])->name('acceptOrder');

//navigate to the placeorder.blade
Route::get('/place-order', [listOfUserOrders::class,'placeOrder'])->middleware(['auth','role:Guest'])->name('placeorder');





require __DIR__.'/auth.php';
