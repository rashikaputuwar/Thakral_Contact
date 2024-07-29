<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleMenuController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcomePage');

// ROUTES FOR USERCONTROLLER
Route::get('/userPage', [UserController::class,'index'])->name('show.User'); 
Route::post('/addUser', [UserController::class,'store'])->name('add.User'); 
Route::get('/user/create', [UserController::class,'create'])->name('create.user');
Route::get('/showUser/{id}', [UserController::class,'show'])->name('showUser');
Route::get('/editUser/{id}',[UserController::class,'edit'])->name('edit.User');
Route::put('/updateuser/{id}',[UserController::class,'update'])->name('update.user');


//ROUTES FOR FORM PAGES--POST METHOD
// Route::view('newuser','user_mg.add.addUser');
// Route::get('newuser', function () {
//     return view('user_mg.add.addUser');
// })->name('newuser');


// routes/web.php

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');

//client 
Route::get('/client',[ClientController::class,'index'])->name('client.index');
Route::get('/clients/create', [ClientController::class, 'createClient'])->name('client.createClient');
Route::get('/clients/create/contact', [ClientController::class, 'createContact'])->name('client.createContact');
Route::get('/client/view/{id}',[ClientController::class,'show'])->name('client.show');
Route::get('/client/edit/{id}', [ClientController::class,'editClient'])->name('client.edit');
Route::put('/client/update/{id}', [ClientController::class,'updateClient'])->name('client.update');

Route::get('/contact',[ClientController::class,'indexContactPerson'])->name('contactPerson.index');
Route::get('/contactPerson/view/{id}',[ClientController::class,'showContactPerson'])->name('contactPerson.show');
Route::get('/contactPerson/edit/{id}', [ClientController::class,'editContactPerson'])->name('contactPerson.edit');
Route::put('/contactPerson/update/{id}', [ClientController::class,'updateContactPerson'])->name('contactPerson.update');

//client store
Route::post('/clients/store', [ClientController::class, 'storeClient'])->name('client.store');
Route::post('/clients/store/contactPerson', [ClientController::class, 'storeContactPerson'])->name('contactPerson.store');

//config.department
Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');
Route::post('/department/store', [DepartmentController::class, 'store'])->name('department.store');
Route::get('/department/show/{id}',[DepartmentController::class,'show'])->name('department.show');


//employee 
Route::get('/employee',[EmployeeController::class,'index'])->name('employee.index');
Route::get('/employee/create', [EmployeeController::class,'create'])->name('employee.create');
Route::post('/employee/store', [EmployeeController::class,'store'])->name('employee.store');
Route::get('/employee/view/{id}', [EmployeeController::class,'show'])->name('employee.show');
Route::get('/employee/edit/{id}', [EmployeeController::class,'edit'])->name('employee.edit');
Route::put('/employee/update/{id}', [EmployeeController::class,'update'])->name('employee.update');



//Designation
Route::get('/designation',[DesignationController::class,'index'])->name('designation.index');
Route::get('/designation/create',[DesignationController::class,'create'])->name('designation.create');
Route::post('/designation/store',[DesignationController::class,'store'])->name('designation.store');
Route::get('/Designation/show/{id}',[DesignationController::class,'show'])->name('designation.show');


//Menu
Route::get('/menu',[MenuController::class,'index'])->name('menu.index');
Route::get('/menu/create',[MenuController::class,'create'])->name('menu.create');
Route::post('/menu/store',[MenuController::class,'store'])->name('menu.store');
Route::get('/menu/view/{id}',[MenuController::class,'show'])->name('menu.show');

//visitor
Route::get('/visitor',[VisitorController::class,'showForm'])->name('visitor.showForm');
Route::post('/visitor',[VisitorController::class,'handleForm'])->name('visitor.handleForm');
Route::post('/visitor/update',[VisitorController::class,'update'])->name('visitor.update');
Route::post('/visitor/create',[VisitorController::class,'create'])->name('visitor.create');


//for permission aka button
Route::get('/button',[PermissionController::class,'index'])->name('button.index');
Route::get('/button/create',[PermissionController::class,'create'])->name('button.create');
Route::post('/button/store',[PermissionController::class,'store'])->name('button.store');


//ROleMenuCOntroller
Route::get('/rolesmenu', [RoleMenuController::class, 'index'])->name('rolesMenu.index');
Route::get('/role/create',[RoleMenuController::class,'create'])->name('rolesMenu.create');
Route::post('/roles/store',[RoleMenuController::class,'store'])->name('rolesMenu.store');
Route::get('/role-menus/{role}', [RoleMenuController::class, 'getRoleMenus']);
