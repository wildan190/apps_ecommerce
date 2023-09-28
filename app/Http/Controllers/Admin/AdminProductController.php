<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_produk' => 'required|unique:products|max:255',
            'kategori_produk_id' => 'required|exists:categories,id',
            'nama_produk' => 'required|max:255',
            'harga_produk' => 'required|numeric',
            'deskripsi_produk' => 'required',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto_produk')) {
            $imagePath = $request->file('foto_produk')->store('produk_images', 'public');
            $validatedData['foto_produk'] = $imagePath;
        }

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'kode_produk' => 'required|unique:products,kode_produk,' . $product->id . '|max:255',
            'kategori_produk_id' => 'required|exists:categories,id',
            'nama_produk' => 'required|max:255',
            'harga_produk' => 'required|numeric',
            'deskripsi_produk' => 'required',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto_produk')) {
            $imagePath = $request->file('foto_produk')->store('produk_images', 'public');
            $validatedData['foto_produk'] = $imagePath;
        }

        $product->update($validatedData);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
