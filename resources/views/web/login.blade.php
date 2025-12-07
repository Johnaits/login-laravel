@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-log shadow-md">
        <h1 class="text-2x1 font-bold text-center">Login</h1>

        <form action="{{route('login')}}" class="space-y-6" method="POST">
            @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{old('email')}}" required class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    @error('email')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                    <input type="password" name="password" id="password" required class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    @error('password')
                        <p class="text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


                <div class="flex space-x-4">
                    <button type="submit"
                            class="w-full px-4 py-2 font-bold text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Entrar
                    </button>
                    <button type="button" target="_blank" onclick="window.location='{{ route('register') }}'"
                            class="w-full px-4 py-2 font-bold text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Cadastre-se
                    </button>
                </div>
        </form>
    </div>
</div>

@endsection