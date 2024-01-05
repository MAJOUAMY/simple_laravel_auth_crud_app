@extends('layouts.app')


@section('main')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="/login" method="post">
  @csrf
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
      <div class="w-full bg-white rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <p class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
            Login
          
          
            </p><div>
              <label class="block mb-2 text-sm font-medium text-gray-900">
              email
              </label>
              <input placeholder="JohnDoe@gmail.com" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" name="email" type="text">
            </div>
            @error('email')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900">
                Password
              </label>
              <input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="••••••••" name="password" type="password">
            </div>
            @error('password')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
            

            <button class="w-full bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  focus:ring-blue-800 text-white" type="submit">
              Login
            </button>
          
        </div>
      </div>
    </div></form>
  
@endsection