@extends('layouts.app')

@section('main')
    

    <div class=" mt-8 flex flex-wrap">
        @foreach ($products as $product)
            <div class="w-full md:w-1/2 lg:w-1/2 xl:w-1/3 p-2">
                <div class="bg-white p-6 rounded mb-4 shadow-md">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="mb-4 rounded-lg w-full">

                    <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
                    <p class="text-gray-600 mb-4">{{ $product->body }}</p>

                    <div class="flex items-center justify-between">
                        <span class="text-gray-700">{{ $product->price }} USD</span>
                        <span class="text-gray-500">{{ $product->created_at->diffForHumans() }}</span>
                    </div>

                    <div class="mt-2">
                        <strong>Created by:</strong> {{ $product->user->username }}
                    </div>

                    <div class="flex mt-4">
                        <a href="{{ route('products.show', ['id' => $product->id]) }}" class="mr-2 text-blue-500 hover:underline">View Details</a>
<<<<<<< HEAD
                  
=======
                        <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="mr-2 text-yellow-500 hover:underline">Edit</a>
                        <form action="{{ route('products.destroy' )}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}" >
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>

                        </form>
>>>>>>> 239395689475b8147e093960c2a2cdb61b18a585
                    </div>
                </div>
            </div>
        @endforeach
    </div>
   
@endsection



