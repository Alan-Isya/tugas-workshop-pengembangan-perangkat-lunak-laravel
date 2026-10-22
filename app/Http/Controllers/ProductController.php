<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|string|max:255',
            'sku' => 'required|string|max:100|unique:products,sku',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $file = $request->file('image');
        $extension = strtolower($file->getClientOriginalExtension());

        $filename = Str::uuid().'.'.
            ($extension === 'png' ? 'png' : 'jpg');

        $path = 'products/'.$filename;

        $manager = new ImageManager(Driver::class);

        $image = $manager
            ->decodePath($file->getPathname())
            ->cover(800, 800);

        if ($extension === 'png') {
            $encoded = $image->encodeUsingFileExtension('png');
        } else {
            $encoded = $image->encodeUsingFileExtension(
                'jpg',
                quality: 85
            );
        }

        Storage::disk('public')->put(
            $path,
            $encoded->toString()
        );

        $data['image'] = $path;

        Product::create($data);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }
}
