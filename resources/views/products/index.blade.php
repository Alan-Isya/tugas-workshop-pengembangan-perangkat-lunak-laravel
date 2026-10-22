<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
</head>
<body>
    <h1>Daftar Produk</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('products.create') }}">Tambah Produk</a>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>SKU</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>
                        @if ($product->image)
                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                width="100"
                                alt="{{ $product->name }}">
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
