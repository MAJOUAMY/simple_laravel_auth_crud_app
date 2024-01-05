@extends('layouts.app')


@section('main')

    <form action="/register" method="POST">
      {{-- @isset($success)
      <h1 class="text-green-500">{{ $success }}</h1>
      @endisset --}}
      <h1 class=" m-auto text-green-500"> {{ session('success') }}</h1>

        @csrf
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
            <div class="w-full bg-white rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <p class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Create an account
                    </p>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">
                            Your username
                        </label>
                        <input placeholder="JohnDoe"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"
                            name="username" type="text">
                    </div>
                    @error('username')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    </p>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">
                            email
                        </label>
                        <input placeholder="JohnDoe@gmail.com"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"
                            name="email" type="text">
                    </div>
                    @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">
                            Password
                        </label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"
                            placeholder="••••••••" name="password" type="password">
                    </div>
                    @error('password')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">
                            Confirm password
                        </label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"
                            placeholder="•••••••" name="password_confirmation" type="password">
                    </div>


                    <button
                        class="w-full bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  focus:ring-blue-800 text-white"
                        type="submit">
                        Create an account
                    </button>

                </div>
            </div>
        </div>
    </form>
@endsection
