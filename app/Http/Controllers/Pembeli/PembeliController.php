<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pembeli.index', compact('products'));
    }

    public function addToCart(Request $request, Product $product)
    {
        // Dapatkan data produk yang akan ditambahkan ke keranjang

        $cart = session()->get('cart'); // Ambil keranjang dari session

        if (!$cart) {
            $cart = [
                $product->id => [
                    'nama' => $product->nama_produk,
                    'harga' => $product->harga_produk,
                    'jumlah' => 1,
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->route('pembeli.index')->with('success', 'Produk ditambahkan ke keranjang.');
        }

        if (isset($cart[$product->id])) {
            $cart[$product->id]['jumlah']++;
            session()->put('cart', $cart);
            return redirect()->route('pembeli.index')->with('success', 'Produk ditambahkan ke keranjang.');
        }

        $cart[$product->id] = [
            'nama' => $product->nama_produk,
            'harga' => $product->harga_produk,
            'jumlah' => 1,
        ];
        session()->put('cart', $cart);
        return redirect()->route('pembeli.index')->with('success', 'Produk ditambahkan ke keranjang.');
    }

    public function viewCart()
    {
        $cart = session()->get('cart');
        $total = 0;

        if (!empty($cart)) {
            foreach ($cart as $item) {
                $total += $item['harga'] * $item['jumlah'];
            }
        }

        return view('pembeli.cart', compact('cart', 'total'));
    }

    public function checkout()
    {
        // Tampilkan halaman checkout
        return view('pembeli.checkout');
    }

    public function processOrder(Request $request)
    {
        // Tangani proses pesanan di sini, simpan data pesanan ke database, dll.
        // ...

        // Setelah proses pesanan selesai, redirect ke halaman sukses atau halaman terima kasih
        return redirect()->route('pembeli.thankYou')->with('success', 'Pesanan berhasil diproses.');
    }
}
