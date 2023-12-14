@extends('layouts.app')

@section('titulo')
    Registrate en Devstagram
@endsection

@section('contenido')

    <div class="md:flex md:justyfy-center md:gap-10 md:items-center">

        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/registrar.jpg')}}"> 
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="/crear-cuenta" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 uppercase text-gray-500 font-bold">
                        Nombre:
                    </label>
                    <input type="text" name="name" id="name" class="border p-3 w-full rounded-lg @error('name') border-red-600 @enderror" value="{{ old ('name') }}">
                    @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{$message}}
                    </p>  
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 uppercase text-gray-500 font-bold">
                        Usuario:
                    </label>
                    <input type="text" name="username" id="username" class="border p-3 w-full rounded-lg @error('username') border-red-600 @enderror"" value="{{ old ('username') }}">
                    @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{$message}}
                    </p>  
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 uppercase text-gray-500 font-bold">
                        Email:
                    </label>
                    <input type="email" name="email" id="email" class="border p-3 w-full rounded-lg @error('email') border-red-600 @enderror"" value="{{ old ('email') }}">
                    @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{$message}}
                    </p>  
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 uppercase text-gray-500 font-bold">
                        Password:
                    </label>
                    <input type="password" name="password" id="password" class="border p-3 w-full rounded-lg @error('password') border-red-600 @enderror"" value="{{ old ('password') }}">
                    @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{$message}}
                    </p>  
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 uppercase text-gray-500 font-bold">
                        Repetir Password:
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-600 @enderror"" value="{{ old ('password_confirmation') }}">
                    @error('password_confirmation')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{$message}}
                    </p>  
                    @enderror
                </div>

                <input type="submit" value="Crear usuario" class="bg-sky-600 text-white hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 rounded-lg">
            </form>
            
        </div>

    </div>
@endsection