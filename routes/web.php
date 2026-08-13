<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\landingpageController;
use App\Http\Controllers\ProductManagementController;
use App\Http\Controllers\SaleController;

Route::get('/landingpage', [landingpageController::class, 'index'])->name('landingpage');
Route::get('/produto/{product}', [ProductController::class, 'show'])->name('produto.show');
Route::get('/vendas', [SaleController::class, 'index'])->name('vendas.index');
Route::get('/produtos/{product}/deletar', [ProductManagementController::class, 'confirmDelete'])->name('produtos.confirm-delete');
Route::resource('produtos', ProductManagementController::class)->parameters(['produtos' => 'product']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';