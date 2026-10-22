<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #999;
            padding: 8px;
        }

        th {
            background-color: #eee;
        }

        .total {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>INVOICE MINIMARKET</h2>
        <p>No. Invoice: INV-{{ $invoice->id }}</p>
        <p>Tanggal: {{ $invoice->date }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->items as $item)
                <tr>
                    <td>{{ $item->product }}</td>
                    <td>Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp{{ number_format($item->total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="total">Grand Total:</td>
                <td>Rp{{ number_format($invoice->total, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
