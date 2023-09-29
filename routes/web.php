<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminUserManagementController;
use App\Http\Controllers\Pembeli\PembeliController;
//use App\Http\Controllers\Pembeli\PembeliCategoryController;
use App\Http\Controllers\Penjual\PenjualCategoryController;
use App\Http\Controllers\Penjual\PenjualProductController;

// Rute untuk Category dan Product Admin
Route::middleware(['auth:sanctum', 'verified', 'role:Admin', 'admin.access'])->prefix('admin')->group(function () {
    // Rute untuk manajemen pengguna oleh Admin
    Route::resource('users', AdminUserManagementController::class)->except(['show']);

    // Rute untuk Category dan Product
    Route::resource('categories', AdminCategoryController::class)->names([
        'create' => 'admin.categories.create',
    ]);
    Route::resource('products', AdminProductController::class)->names([
        'create' => 'admin.products.create',
    ]);

    // Rute untuk menyimpan produk oleh Admin
    Route::post('products/store', [AdminProductController::class, 'store'])->name('admin.products.store');

    // Dashboard Admin
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    });
});

// Rute-rute untuk Category dan Product Pembeli
Route::middleware(['auth:sanctum', 'verified', 'role:Pembeli'])->prefix('pembeli')->group(function () {
    Route::get('/', [PembeliController::class, 'index'])->name('pembeli.index');
    Route::get('/cart', [PembeliController::class, 'viewCart'])->name('pembeli.viewCart');
    Route::get('/addToCart/{product}', [PembeliController::class, 'addToCart'])->name('pembeli.addToCart');
    
    // Tambahkan rute untuk menghapus item dari keranjang belanja
    Route::get('/removeFromCart/{product}', [PembeliController::class, 'removeFromCart'])->name('pembeli.removeFromCart');
    
    // Tambahkan rute untuk proses checkout
    Route::get('/checkout', [PembeliController::class, 'checkout'])->name('pembeli.checkout');
    // Tampilan halaman checkout
    Route::get('/checkout', [PembeliController::class, 'checkout'])->name('pembeli.checkout');
    
    // Rute untuk memproses pesanan
    Route::post('/processOrder', [PembeliController::class, 'processOrder'])->name('pembeli.processOrder');
});


// Rute untuk Category dan Product Penjual
Route::middleware(['auth:sanctum', 'verified', 'role:Penjual'])->prefix('penjual')->group(function () {
    

    // Rute untuk menyimpan produk oleh Penjual
    Route::post('products/store', [PenjualProductController::class, 'store'])->name('penjual.products.store');

    Route::resource('products', PenjualProductController::class)->names([
        'create' => 'penjual.products.create',
    ]);

    // Dashboard Penjual
    Route::get('dashboard', function () {
        return view('penjual.dashboard');
    });
});

// Rute Beranda
Route::get('/', function () {
    return view('welcome');
});

// Rute Dashboard Umum
Route::middleware([
    'auth:sanctum',
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
