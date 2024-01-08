<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        return view("products.create");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'required|exists:users,id',
        ]);

        $imagePath = $request->file('image')->store('product_images', 'public');

        Product::create([
            'name' => $validatedData['name'],
            'body' => $validatedData['body'],
            'price' => $validatedData['price'],
            'image' => $imagePath,
            'user_id' => $validatedData['user_id'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'required|exists:users,id',
        ]);


        $oldImagePath = $product->image;

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('product_images', 'public');


            $product->update([
                'name' => $validatedData['name'],
                'body' => $validatedData['body'],
                'price' => $validatedData['price'],
                'image' => $imagePath,
                'user_id' => $validatedData['user_id'],
            ]);


            if ($oldImagePath) {
                Storage::disk('public')->delete($oldImagePath);
            }
        } else {

            $product->update($validatedData);
        }

        return redirect()->route('products.show', ['id' => $product->id])
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Request $request)
    {

        $id=$request["id"];

        $product = Product::findOrFail($id);


        $imagePath = $product->image;
        if ($imagePath) {
            Storage::disk('public')->delete($imagePath);
        }


        $product->delete();

        return redirect()->route('dashboard')->with('success', 'Product deleted successfully.');
    }
}
