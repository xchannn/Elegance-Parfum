<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|string',
            'is_featured' => 'boolean',
            'category_id' => 'required|exists:categories,id'
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $product = Product::create($validated);
        return response()->json($product, 201);
    }

    public function show(Product $product)
    {
        return response()->json($product->load('category'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'description' => 'string',
            'price' => 'numeric|min:0',
            'stock' => 'integer|min:0',
            'image' => 'nullable|string',
            'is_featured' => 'boolean',
            'category_id' => 'exists:categories,id'
        ]);

        if (isset($validated['name'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $product->update($validated);
        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }

    public function featured()
    {
        $featuredProducts = Product::where('is_featured', true)
            ->with('category')
            ->get();
        return response()->json($featuredProducts);
    }

    public function byCategory($categoryId)
    {
        $products = Product::where('category_id', $categoryId)
            ->with('category')
            ->get();
        return response()->json($products);
    }
} 