<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller

{
    // Display all products
    public function index()
    {
        $data['title'] = 'All Products';
        $data['products'] = Products::orderBy('created_at', 'desc')->get();
        return view('backend.products.index', $data);
    }

    // Show the form to create a new product
    public function create()
    {
        return view('backend.products.create');
    }

    // Store a new product in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'published' => 'required|boolean',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('products', 'public');
            $validatedData['photo'] = $photoPath;
        }
        Products::create($validatedData);

        return redirect()->route('adminProducts')->with('success', 'Product created successfully!');
    }

    // Show the form to edit a product
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('backend.products.edit', compact('product'));
    }

    // Update a product in the database
    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'published' => 'required|boolean',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }

            $photoPath = $request->file('photo')->store('products', 'public');
            $validatedData['photo'] = $photoPath;
        }

        $product->update($validatedData);

        return redirect()->route('adminProducts')->with('success', 'Product updated successfully!');
    }

    // Delete a product from the database
    public function destroy($id)
    {
        $product = Products::findOrFail($id);

        // Delete the photo if it exists
        if ($product->photo) {
            Storage::disk('public')->delete($product->photo);
        }

        $product->delete();

        return redirect()->route('adminProducts')->with('success', 'Product deleted successfully!');
    }
}
