<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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
    Alert::success('Success Title', 'Success Message');
    return view('/auth/login');
});

require __DIR__.'/auth.php';

Route::middleware(['admin'])->group(function () {

    Route::get('/adduser', function() {
        return view('pages/adduser');
    })->name('adduser');

    Route::post('/adduser', [userController::class, 'store']
    )->name('storeUser');

    Route::delete('/deleteUser/{id}', [userController::class, 'DeleteUser']
    )->name('deleteUser');

    Route::get('/editUser/{id}', [userController::class, 'EditUser']
    )->name('editUser');

    Route::put('/updateUser/{id}', [userController::class, 'UpdateUser']
    )->name('updateUser');

    Route::resource('industries', IndustryController::class, ['except' => ['index']]);

});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [userController::class, 'AllUser'])->name('dashboard');
    Route::resource('companies', CompanyController::class);
    Route::get('/industries', [IndustryController::class, 'index'])->name('industries.index');
    Route::get('/changePassword', [userController::class, 'ChangePassword'])->name('changePass');
    Route::put('/updatePassword', [userController::class, 'UpdatePassword'])->name('updatePassword');
    Route::get('/editProfile', [userController::class, 'EditProfile']
    )->name('editProfile');
    Route::put('/updateProfile/{id}', [userController::class, 'UpdateProfile']
    )->name('updateProfile');
    Route::get('/search', [companyController::class, 'Search']
    )->name('companies.search');
});
