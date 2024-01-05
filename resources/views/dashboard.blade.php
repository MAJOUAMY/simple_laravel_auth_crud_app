@extends('layouts.app')

@section('main')
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded-md shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <a href="/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Create
    </a>

    <div class="max-w-2xl mx-auto mt-8">
        @foreach ($products as $product)
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


                <a href="{{ route('products.show', ['id' => $product->id]) }}"
                    class="mt-2 text-blue-500 hover:underline">View Details</a>
            </div>
        @endforeach
    </div>
@endsection
