<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $adminData = User::find(Auth::user()->id);
    return view('admin.index',compact('adminData'));
})->name('dashboard');


Route::get('/admin/logout',[AdminController::class,'Logout'])->name('admin.logout');


//+------------------------ User Management all Route  --------------------------------------+//

Route::prefix('user')->group(function(){

    Route::get('/view',[UserController::class,'ViewUser'])->name('view.user');
    Route::get('/add',[UserController::class,'AddUser'])->name('add.user');
    Route::post('/store',[UserController::class,'StoreUser'])->name('store.user');
    Route::post('/update/{id}',[UserController::class,'UpdateUser'])->name('user.update');
    Route::get('/delete/{id}',[UserController::class,'DeleteUser'])->name('user.delete');

});


//+---------------------- Profile routes and password 

Route::prefix('profile')->group(function(){
    Route::get('/view',[ProfileController::class,'ViewProfile'])->name('profile.view');
    Route::get('/edit',[ProfileController::class,'EditProfile'])->name('profile.edit');
    Route::post('/update',[ProfileController::class,'UpdateProfile'])->name('profile.update');
    Route::get('/changePassword',[ProfileController::class,'ChangePassword'])->name('profile.change.password');
    Route::post('/Update/password',[ProfileController::class,'UpdatePassword'])->name('profile.update.password');

});



