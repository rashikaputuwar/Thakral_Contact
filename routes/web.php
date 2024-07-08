<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleMenuController;
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

//client 
Route::get('/client',[ClientController::class,'index'])->name('client.index');
Route::get('/contact',[ClientController::class,'indexContactPerson'])->name('contactPerson.index');
Route::get('/clients/create', [ClientController::class, 'createClient'])->name('client.createClient');
Route::get('/clients/create/contact', [ClientController::class, 'createContact'])->name('client.createContact');

//client store
Route::post('/clients/store', [ClientController::class, 'storeClient'])->name('client.store');
Route::post('/clients/store/contactPerson', [ClientController::class, 'storeContactPerson'])->name('contactPerson.store');



//for rolemenu
Route::get('/rolesmenu', [RoleMenuController::class, 'index'])->name('rolesmenu');

