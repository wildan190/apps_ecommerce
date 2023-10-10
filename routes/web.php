<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminUserManagementController;
use App\Http\Controllers\Pembeli\PembeliController;
use App\Http\Controllers\Pembeli\PembeliOrderController;
use App\Http\Controllers\Penjual\PenjualCategoryController;
use App\Http\Controllers\Penjual\PenjualProductController;
use App\Http\Controllers\Penjual\PenjualController;
use App\Http\Controllers\Penjual\PenjualRiwayatOrderController;
use App\Http\Controllers\Penjual\PenjualDashboardController;

// Rute untuk Category dan Product Admin
Route::middleware(['auth:sanctum', 'verified', 'role:Admin', 'admin.access'])->prefix('admin')->group(function () {
    // Rute untuk manajemen pengguna oleh Admin
    Route::resource('users', AdminUserManagementController::class)->except(['show']);

    // Rute untuk Category dan Product
    Route::resource('acategories', AdminCategoryController::class)->names([
        'create' => 'admin.acategories.create',
    ]);
    Route::resource('aproducts', AdminProductController::class)->names([
        'create' => 'admin.products.create',
    ]);

    // Dashboard Admin
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    });
});

// Rute-rute untuk Category dan Product Pembeli
Route::middleware(['auth:sanctum', 'verified', 'role:Pembeli'])->prefix('pembeli')->group(function () {
    Route::get('/product/detail/{id}', [PembeliController::class, 'showProductDetail'])->name('pembeli.product.detail');
    Route::get('/', [PembeliController::class, 'index'])->name('pembeli.index');
    Route::get('/cart', [PembeliController::class, 'viewCart'])->name('pembeli.viewCart');
    Route::get('/addToCart/{product}', [PembeliController::class, 'addToCart'])->name('pembeli.addToCart');
    Route::get('my-orders', [PembeliOrderController::class, 'index'])->name('pembeli.orders.index');
    Route::get('/pembeli/orders/{id}', [PembeliOrderController::class, 'show'])->name('pembeli.orders.show'); // Halaman "View Pesanan"

    // Tambahkan rute untuk menghapus item dari keranjang belanja
    Route::get('/removeFromCart/{product}', [PembeliController::class, 'removeFromCart'])->name('pembeli.removeFromCart');

    // Tambahkan rute untuk proses checkout
    Route::get('/checkout', [PembeliController::class, 'checkout'])->name('pembeli.checkout');

    // Rute untuk memproses pesanan
    Route::post('/processOrder', [PembeliController::class, 'processOrder'])->name('pembeli.processOrder');
    Route::post('/pembeli/storeOrder', [PembeliController::class, 'storeOrder'])->name('pembeli.storeOrder');
    Route::get('/pembeli/thankyou', [PembeliController::class, 'thankyou'])->name('pembeli.thankyou');
});

// Rute untuk Category dan Product Penjual
Route::middleware(['auth:sanctum', 'verified', 'role:Penjual'])->prefix('penjual')->group(function () {
    // Rute untuk menyimpan produk oleh Penjual
    Route::get('/penjual/orders', [PenjualController::class, 'orders'])->name('penjual.orders');
    Route::get('penjual/orders/{order}', [PenjualController::class, 'show'])->name('penjual.orders.show');
    Route::get('/penjual/orders/{order}/confirm', [PenjualController::class, 'confirmOrder'])->name('penjual.confirmOrder');
    Route::get('/cetak-invoice/{orderId}', [PenjualController::class, 'cetakInvoice'])->name('penjual.cetakInvoice');
    Route::post('products/store', [PenjualProductController::class, 'store'])->name('penjual.products.store');
    Route::get('orders/riwayat', [PenjualRiwayatOrderController::class, 'index'])->name('penjual.orders.riwayat');
    Route::resource('products', PenjualProductController::class)->names([
        'create' => 'penjual.products.create',
    ]);
    Route::resource('categories', PenjualCategoryController::class)->names([
        'create' => 'penjual.categories.create',
    ]);
    Route::get('dashboard', [PenjualDashboardController::class, 'index'])->name('penjual.dashboard');


    // Dashboard Penjual
    
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
