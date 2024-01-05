<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


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
            'image' => 'required',
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
    

   
    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}
