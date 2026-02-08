<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdministratorController;
use App\Http\controllers\SessionController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\RequestController;

use App\Models\Items;
use App\Models\Request;
use App\Models\admin;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/admin', function () {
//     return view('testAdmin');
// });

Route::get('/adminDashboard', [AdministratorController::class, 'dashboard'])->name('adminDashboard');

Route::get('/dashboard', function () {
    $user = auth()->user();
    $request = Request::where('user_id', $user->id)->get();
    return view('dashboard', ['user' => $user, 'request' => $request]);
})->middleware('auth');

Route::get('/admin', [AdminController::class, 'index'])->name('testAdmin');

// Route::post('/admin', function () {
//     //validate ...

//     admin::create([
//         'name' => request('name'),
//         'email' => request('email'),
//         'staff_id' => request('staff_id'),
//         'password' => request('password')
//     ]);

//     return redirect('/admin/show');
// });

Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/show', [AdminController::class, 'show'])->name('admin.show');

Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::patch('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');

Route::delete('admin/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

// Administrator Routes
Route::get('/adminInventory', function () {
    $items = Items::all();
    return view('Administrator.adminInventory', ['items' => $items]);
});

// Route::get('/requests', function () {
//     return view('request_item');
// });

// Route::get('/adminRequests', function () {
//     $requested_info = Request::all();
//     return view('Administrator.adminRequest', [
//         'requested_info' => $requested_info
//     ]);
// });

Route::get('adminRegister', [AdministratorController::class, 'index'])->name('adminRegister');
Route::post('adminRegister', [AdministratorController::class, 'register'])->name('adminRegister.store');

Route::get('adminProfile', [AdministratorController::class, 'profile'])->name('adminProfile');
Route::get('/users', [AdministratorController::class, 'users'])->name('users');
Route::get('/reports', [AdministratorController::class, 'reports'])->name('reports');

Route::get('adminLogin', [SessionController::class, 'index'])->name('adminLogin');
Route::post('adminLogin', [SessionController::class, 'store'])->name('adminLogin.store');

Route::delete('adminLogout', [AdministratorController::class, 'logout'])->name('adminLogout');

// Items Resource Routes
Route::get('/items', [ItemsController::class, 'index'])->name('items.index');

Route::get('/items/add', [ItemsController::class, 'add'])->name('items.add');
Route::post('/items/add', [ItemsController::class, 'store'])->name('items.store');

Route::get('/items/{id}', [ItemsController::class, 'show'])->name('items.show');

Route::get('/items/{id}/edit', [ItemsController::class, 'edit'])->name('items.edit');
Route::patch('/items/edit/{id}', [ItemsController::class, 'update'])->name('items.update');

Route::delete('/items/destroy/{id}', [ItemsController::class, 'destroy'])->name('items.destroy');

Route::get('requests', [RequestController::class, 'index'])->name('requests.index');
Route::post('requests', [RequestController::class, 'store'])->name('requests.store');
Route::get('adminRequests', [RequestController::class, 'show'])->name('requests.show');
Route::get('adminRequests/{id}', [RequestController::class, 'edit'])->name('requests.edit');
Route::patch('adminRequests/{id}/approve', [RequestController::class, 'approve'])->name('requests.approve');
Route::delete('adminRequests/{id}/destroy', [RequestController::class, 'destroy'])->name('requests.destroy');