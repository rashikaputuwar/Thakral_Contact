<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleMenuController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ROUTES FOR USERCONTROLLER
Route::get('/userPage', [UserController::class,'index'])->name('show.User'); 
Route::post('/addUser', [UserController::class,'store'])->name('add.User'); 
Route::get('/showUser/{id}', [UserController::class,'show'])->name('showUser');
Route::get('/editUser/{id}',[UserController::class,'edit'])->name('edit.User');


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

//config.department
Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');
Route::post('/department/store', [DepartmentController::class, 'store'])->name('department.store');


//employee 
Route::get('/employee',[EmployeeController::class,'index'])->name('employee.index');
Route::get('/employee/create', [EmployeeController::class,'create'])->name('employee.create');
Route::post('/employee/store', [EmployeeController::class,'store'])->name('employee.store');

//for rolemenu
Route::get('/rolesmenu', [RoleMenuController::class, 'index'])->name('rolesmenu');


//Designation
Route::get('/designation',[DesignationController::class,'index'])->name('designation.index');
Route::get('/designation/create',[DesignationController::class,'create'])->name('designation.create');
Route::post('/designation/store',[DesignationController::class,'store'])->name('designation.store');


//Menu
Route::get('/menu',[MenuController::class,'index'])->name('menu.index');
Route::get('/menu/create',[MenuController::class,'create'])->name('menu.create');
Route::post('/menu/store',[MenuController::class,'store'])->name('menu.store');

//visitor
Route::get('/visitor',[VisitorController::class,'index'])->name('visitor.index');




