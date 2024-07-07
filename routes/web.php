<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ROUTES FOR USERCONTROLLER
Route::get('/userPage', [UserController::class,'index'])->name('show.User'); 
Route::post('/addUser', [UserController::class,'store'])->name('add.User'); 


//ROUTES FOR FORM PAGES--POST METHOD
// Route::view('newuser','user_mg.add.addUser');
Route::get('newuser', function () {
    return view('user_mg.add.addUser');
})->name('newuser');


// routes/web.php

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');

