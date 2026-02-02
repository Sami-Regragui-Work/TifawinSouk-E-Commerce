<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(15);
        $columns = [
            ['name' => 'name', 'label' => 'Name'],
            ['name' => 'reference', 'label' => 'Ref.'],
            ['name' => 'category.name', 'label' => 'Category'],
            ['name' => 'price', 'label' => 'Price'],
            ['name' => 'stock', 'label' => 'Stock'],
            ['name' => 'created_at', 'label' => 'Created'],
        ];
        return view('admin.products.index', compact('products', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $fields = [
            ['name' => 'name', 'label' => 'Name', 'required' => true],
            ['name' => 'reference', 'label' => 'Reference', 'required' => true],
            ['name' => 'short_description', 'label' => 'Description', 'type' => 'textarea', 'required' => true],
            ['name' => 'price', 'label' => 'Price (Dh)', 'type' => 'number', 'step' => '0.01', 'required' => true],
            ['name' => 'stock', 'label' => 'Stock', 'type' => 'number', 'required' => true],
            ['name' => 'category_id', 'label' => 'Category', 'type' => 'select', 'options' => $categories, 'required' => true],
            ['name' => 'image_url', 'label' => 'Image URL', 'type' => 'url'],
        ];
        return view('admin.products.create', compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'reference' => 'required|string|unique:products|max:50',
            'short_description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url|max:500'
        ]);

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id');
        $fields = [
            ['name' => 'name', 'label' => 'Name', 'required' => true],
            ['name' => 'reference', 'label' => 'Reference', 'required' => true],
            ['name' => 'short_description', 'label' => 'Description', 'type' => 'textarea', 'required' => true],
            ['name' => 'price', 'label' => 'Price (Dh)', 'type' => 'number', 'step' => '0.01', 'required' => true],
            ['name' => 'stock', 'label' => 'Stock', 'type' => 'number', 'required' => true],
            ['name' => 'category_id', 'label' => 'Category', 'type' => 'select', 'options' => $categories, 'required' => true],
            ['name' => 'image_url', 'label' => 'Image URL', 'type' => 'url'],
        ];
        return view('admin.products.edit', compact('product', 'fields'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'reference' => 'required|string|max:50|unique:products,reference,' . $product->id,
            'short_description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url|max:500'
        ]);

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }
}
