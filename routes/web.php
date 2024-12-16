<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserTokenController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');//->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('LetMeIn')->group(function () {

//EMPLEADOS    
Route::get('Employee.index',[EmployeeController::class,'index']);
Route::get('Employee.new',[EmployeeController::class,'add']);
Route::post('Employee.store',[EmployeeController::class,'store']);
Route::get('Employee.edit/{id}',[EmployeeController::class,'edit']);
Route::post('Employee.update/{id}',[EmployeeController::class,'update']);
Route::get('Employee.delete/{id}',[EmployeeController::class,'destroy']);


//Cocina
Route::get('Order.index',[OrderController::class,'index']);
Route::get('Order.show/{id}',[OrderController::class,'show']);//VER UNA ORDEN A DETALLE
Route::get('Order.update/{id}',[OrderController::class,'update']);//DAR DE ALTA UNA ORDEN
Route::get('Order.delete/{id}',[OrderController::class,'destroy']);//CANCELAR UNA ORDEN
Route::get('Cook.index', [OrderController::class, 'cook']);
Route::get('Cook.show/{id}', [OrderController::class, 'cook_show']);



//CUPONES
Route::get('Coupon.index',[CouponController::class,'index']);
Route::get('Coupon.new',[CouponController::class,'add']);
Route::post('Coupon.store',[CouponController::class,'store']);
Route::get('Coupon.edit/{id}',[CouponController::class,'edit']);
Route::post('Coupon.update/{id}',[CouponController::class,'update']);
Route::get('Coupon.delete/{id}',[CouponController::class,'destroy']);



// Route::post('supplier_almacenar',[EmployeeController::class,'store']);
// Route::get('suppliers/supplier_agregar',[EmployeeController::class,'add']);
// Route::get('suppliers/supplier_editar/{id}',[EmployeeController::class,'edit']);
// Route::post('suppliers_actualizar/{id}',[EmployeeController::class,'update']);
// Route::get('supplier_cambiar_estauts/{id}',[EmployeeController::class,'destroy']);


//PRODUCTOS
Route::get('Products.index',[ProductsController::class,'index']);
Route::get('Products.new',[ProductsController::class,'add']);
Route::post('Products.store',[ProductsController::class,'store']);
Route::get('Products.edit/{id}',[ProductsController::class,'edit']);
Route::post('Products.update/{id}',[ProductsController::class,'update']);
Route::get('Products.delete/{id}',[ProductsController::class,'destroy']);






});//LET ME IN MIDDLEWARE

Route::post('/login',[UserTokenController::class,'in'])->name('login.auth');
Route::get('login',[UserTokenController::class,'login'])->name('login.form');
Route::post('logout',[UserTokenController::class,'out'])->name('logout');





//require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {
    //Route::get('dashboard', [AuthController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
