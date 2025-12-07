<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Login')</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body  class="bg-gray-100 text-gray-800">
    <main class="container mx-auto mt-10">
        @if ($errors->has('token'))
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ $errors->first('token') }}
            </div>
        @endif
        @yield('content')
    </main>
</body>
</html>