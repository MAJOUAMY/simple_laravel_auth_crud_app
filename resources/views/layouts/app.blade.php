<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="font-sans bg-gray-100">

    <header class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between h-14 bg-blue-500 text-white p-4">
        <div class="ml-4">
            @guest
            <a href="{{ route('login') }}" class="mr-4">Login</a>
            <a href="{{ route('register') }}">Register</a>
            @endguest
            
            @auth
            <form action="/logout" method="post" class="inline-block">
                @csrf
                <button type="submit" class="ml-4">Logout</button>
            </form>
            @endauth
        </div>
    </header>

    <main class="container mx-auto mt-20 mb-20 p-4">
        @yield('main')
    </main>

    <footer class="fixed bottom-0 left-0 right-0 z-50 flex items-center justify-center h-14 bg-blue-500 text-white p-4">
        Footer
    </footer>

</body>

</html>
