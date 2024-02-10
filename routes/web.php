<?php

use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoiceDetailsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\ProductController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Invoices Controller
Route::resource('invoices', invoicesController::class);
Route::get('/invoices', [invoicesController::class, 'index'])->name('invoices.index');
Route::post('/invoices', [invoicesController::class, 'store'])->name('invoices.store');
Route::post('/invoices/{invoice}/edit', [invoicesController::class, 'edit'])->name('invoices.edit');
Route::put('/invoices/{invoice}/update', [invoicesController::class, 'update'])->name('invoices.update');
Route::get('/invoices/{invoice}/destroy', [invoicesController::class, 'destroy'])->name('invoices.destroy');

Route::get('/section/{id}', [InvoicesController::class, 'getproducts']);

Route::get('/invoice_edit/{id}', [InvoicesController::class, 'edit']);



// Sections Controller
Route::resource('sections', SectionsController::class);
Route::get('/sections', [SectionsController::class, 'index'])->name('sections.index');
Route::post('/sections', [SectionsController::class, 'store'])->name('sections.store');
Route::post('/sections/{section}/edit', [SectionsController::class, 'edit'])->name('sections.edit');
Route::put('/sections/{section}/update', [SectionsController::class, 'update'])->name('sections.update');
Route::delete('/sections/{section}/destroy', [SectionsController::class, 'destroy'])->name('sections.destroy');


// Products Controller
Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::post('/products', [ProductController::class, 'store'])->name('product.store');
Route::post('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/products/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/InvoicesDetails/{id}', [InvoiceDetailsController::class, 'edit']);




