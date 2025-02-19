<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $shippingMethods = ShippingMethod::all();
        return view('dashboard.admin.products.create', compact('categories', 'shippingMethods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'stock' => 'nullable|integer',
            'type' => 'required|in:digital,physical',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video_url' => 'nullable|string',
            'license_type' => 'nullable|string',
            'license_expiry' => 'nullable|date',
            'download_limit' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'is_returnable' => 'nullable|boolean',
            'warranty_period' => 'nullable|integer',
            'category_id' => 'nullable|exists:categories,id',
            'parent_category_id' => 'nullable|exists:categories,id',
            'physical_shipping' => 'nullable|boolean',
            'shipping_method_id' => 'nullable|exists:shipping_methods,id',
        ]);

        $data = $request->except('image');

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image_url'] = $imagePath;
        }

        $data['slug'] = Str::slug($data['slug']);

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $shippingMethods = ShippingMethod::all();
        return view('dashboard.admin.products.edit', compact('product', 'categories', 'shippingMethods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug,' . $product->id,
            'description' => 'required|string',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'stock' => 'nullable|integer',
            'type' => 'required|in:digital,physical',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'shipping_method_id' => 'nullable|exists:shipping_methods,id',
            'is_active' => 'nullable|boolean',
            'is_returnable' => 'nullable|boolean',
            'warranty_period' => 'nullable|integer',
            'download_limit' => 'nullable|integer',
            'license_type' => 'nullable|string',
            'license_expiry' => 'nullable|date',
            'video_url' => 'nullable|string',
            'physical_shipping' => 'nullable|boolean',
            'parent_category_id' => 'nullable|exists:categories,id'
        ]);

        $imagePath = $product->image_url;
        if ($request->hasFile('image')) {
            if ($product->image_url) {
                Storage::disk('public')->delete($product->image_url); // Hapus gambar lama
            }
            $imagePath = $request->file('image')->store('products', 'public'); // Simpan gambar baru di public/assets/products
        }

        $product->update(array_merge($request->except('image'), ['image_url' => $imagePath, 'slug' => Str::slug($request->slug)]));

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image_url) {
            Storage::disk('public')->delete($product->image_url); // Hapus gambar
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
