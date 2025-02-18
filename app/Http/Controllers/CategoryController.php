<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->get();
        return view('dashboard.admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $parentCategories = Category::whereNull('parent_id')->get();
        return view('dashboard.admin.categories.create', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'is_active' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $validated['slug'] = Str::slug($request->title, '-');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('categories', $request->file('image')->getClientOriginalName(), 'public');
            $validated['image'] = $imagePath;
        }

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        $parentCategories = Category::whereNull('parent_id')->get();
        return view('dashboard.admin.categories.edit', compact('category', 'parentCategories'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug,' . $category->id,
            'is_active' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            if ($category->image && file_exists(public_path('assets/' . $category->image))) {
                unlink(public_path('assets/' . $category->image));
            }
            $imagePath = $request->file('image')->storeAs('categories', $request->file('image')->getClientOriginalName(), 'public');
            $validated['image'] = $imagePath;
        }

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        if ($category->image && file_exists(public_path('assets/' . $category->image))) {
            unlink(public_path('assets/' . $category->image));
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
