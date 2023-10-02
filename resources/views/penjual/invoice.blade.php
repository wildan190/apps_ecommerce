<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        /* Gaya CSS untuk invoice */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .invoice-header {
            text-align: center;
            background-color: #f2f2f2;
            padding: 10px;
        }

        .invoice-header h1 {
            margin: 0;
            color: #333;
        }

        .invoice-details {
            margin-top: 20px;
        }

        .invoice-details p {
            margin: 0;
            font-size: 14px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .invoice-table th {
            background-color: #f2f2f2;
        }

        .invoice-total {
            margin-top: 20px;
            text-align: right;
        }

        .invoice-total p {
            font-weight: bold;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="invoice-header">
        <h1>Invoice</h1>
    </div>

    <div class="invoice-details">
        <p><strong>Nomor Pesanan:</strong> {{ $order->id }}</p>
        <p><strong>Tanggal Pesanan:</strong> {{ $order->created_at }}</p>
        <p><strong>Nama Penerima:</strong> {{ $order->nama_penerima }}</p>
        <p><strong>Alamat Penerima:</strong> {{ $order->alamat_lengkap }}, {{ $order->kota }}, {{ $order->provinsi }}, {{ $order->kode_pos }}</p>
        <!-- Tambahkan informasi lainnya seperti alamat, kontak, dll. -->
    </div>

    <table class="invoice-table">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
            <tr>
                <td>{{ $item->product->nama_produk }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>Rp {{ number_format($item->product->harga_produk, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($item->jumlah * $item->product->harga_produk, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="invoice-total">
        <p><strong>Subtotal:</strong> Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
        <p><strong>Pajak (10%):</strong> Rp {{ number_format($tax, 0, ',', '.') }}</p>
        <p><strong>Total:</strong> Rp {{ number_format($subtotal + $tax, 0, ',', '.') }}</p>
    </div>
</body>

</html>