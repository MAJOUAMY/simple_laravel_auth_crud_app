@extends('layouts.app')

@section('main')
    <div class="max-w-2xl mx-auto mt-8">
        <div class="bg-white p-6 rounded shadow-md">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="mb-4 rounded-lg w-full">

            <h2 class="text-2xl font-semibold mb-2">{{ $product->name }}</h2>
            <p class="text-gray-600 mb-4">{{ $product->body }}</p>

            <div class="flex items-center justify-between mb-4">
                <span class="text-gray-700">Price: {{ $product->price }} USD</span>
                <span class="text-gray-500">{{ $product->created_at->diffForHumans() }}</span>
            </div>

            <div class="mb-4">
                <strong>Created by:</strong> {{ $product->user->username }} 
            </div>

            
        </div>
    </div>
@endsection
