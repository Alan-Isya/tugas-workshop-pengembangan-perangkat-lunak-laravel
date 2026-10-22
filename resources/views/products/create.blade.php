<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>
<body>
    <h1>Upload Gambar Produk</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('products.store') }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <p>Nama Produk</p>
        <input type="text" name="name" required>

        <p>Kategori</p>
        <input type="text" name="category_id">

        <p>SKU</p>
        <input type="text" name="sku" required>

        <p>Harga</p>
        <input type="number" name="price"
            min="0" step="0.01" required>

        <p>Stok</p>
        <input type="number" name="stock"
            min="0" value="0" required>

        <p>Deskripsi</p>
        <textarea name="description"></textarea>

        <p>Gambar Produk</p>
        <input type="file" name="image"
            accept=".jpg,.jpeg,.png,.webp" required>

        <br><br>
        <button type="submit">Simpan Produk</button>
    </form>

    <p><a href="{{ route('products.index') }}">
        Lihat Daftar Produk
    </a></p>
</body>
</html>
