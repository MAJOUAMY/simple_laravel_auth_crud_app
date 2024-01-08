@extends('layouts.app')

{{-- @php
    dd($product);

@endphp --}}
@section('main')
<form action="" enctype="multipart/form-data" method="post" class="max-w-md mx-auto bg-white p-8 mt-10 rounded shadow-md">
    @csrf
    
    <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Product Name:</label>
        <input type="text" value="{{ $product["name"] }}"  id="name" name="name" class="w-full p-2 border border-gray-300 rounded" required>
    </div>
    
    <div class="mb-4">
        <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Product Description:</label>
        <textarea id="body"  name="body" class="w-full p-2 border border-gray-300 rounded" required>
            {{ $product["body"] }}
        </textarea>
    </div>
    
    <div class="mb-4">
        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Product Price:</label>
        <input type="number" value="{{ $product["price"] }}"   id="price" name="price" class="w-full p-2 border border-gray-300 rounded" step="0.01" required>
    </div>
    
    <div class="mb-4">
        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Product Image</label>
        <input type="file" value="{{ $product["image"] }}"   id="image" name="image" class="w-full p-2 border border-gray-300 rounded" required>
    </div>
    
    <!-- Assuming you have authentication and a logged-in user -->
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    
    <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded hover:bg-blue-700">Create Product</button>
</form>

@foreach ($errors->all() as $e)
<p style="color: red">
{{ $e }}
</p>
    
@endforeach

    
@endsection