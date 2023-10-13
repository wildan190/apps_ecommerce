<!DOCTYPE html>
<html>
<head>
    <title>Sales Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Sales Report</h2>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Quantity Sold</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salesData as $item)
                <tr>
                    <td>{{ $item->order_id }}</td>
                    <td>{{ $item->product->nama_produk }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->harga }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
