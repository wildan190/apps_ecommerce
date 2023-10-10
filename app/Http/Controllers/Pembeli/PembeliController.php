<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembeliController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pembeli.index', compact('products'));
    }

    public function showProductDetail($id)
    {
        $product = Product::findOrFail($id);
        return view('pembeli.detail', compact('product'));
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

    public function removeFromCart(Request $request, $productId)
    {
        // Ambil data keranjang belanja dari session
        $cart = session()->get('cart');

        // Periksa apakah produk dengan ID yang diberikan ada dalam keranjang
        if (isset($cart[$productId])) {
            // Hapus produk dari keranjang
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    public function checkout()
    {
        $cart = session('cart', []);

        // Tampilkan halaman checkout dan pass data keranjang belanja
        return view('pembeli.checkout', compact('cart'));
    }

    public function storeOrder(Request $request)
    {
        // Validasi data yang diterima dari formulir checkout
        $validatedData = $request->validate([
            // Sesuaikan dengan kolom-kolom yang ada di migrasi Order
            'nama_penerima' => 'required',
            'alamat_lengkap' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'nomor_telepon' => 'required',
            'metode_pembayaran' => 'required',
        ]);

        // Simpan data order ke dalam database
        $order = new Order($validatedData);
        $order->user_id = auth()->user()->id; // Menghubungkan order dengan pembeli yang sedang login
        $order->save();

        // Simpan data item pembelian (order items) ke dalam database
        foreach (session('cart') as $productId => $item) {
            $orderItem = new OrderItem([
                'product_id' => $productId,
                'jumlah' => $item['jumlah'],
                'harga' => $item['harga'],
            ]);

            // Hubungkan order item dengan order yang baru dibuat
            $order->orderItems()->save($orderItem);
        }

        // Hapus keranjang belanja setelah pesanan berhasil disimpan
        session()->forget('cart');

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('pembeli.thankyou')->with('success', 'Pesanan berhasil disimpan.');
    }

    public function thankyou()
    {
        return view('pembeli.thankyou');
    }
}
