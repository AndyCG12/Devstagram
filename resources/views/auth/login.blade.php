@extends('layouts.app')

@section('titulo')
        Inicia sesión en devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justyfy-center md:gap-10 md:items-center">

        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/login.jpg')}}"> 
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="/login" method="POST" novalidate>
                @csrf
                
                @if (session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{session('mensaje')}}
                </p>  
                @endif
                
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
                    <input type="checkbox" name="remember"> <label class="text-gray-500 text-sm"> Mantener mi sesion abierta </label>
                </div>

                <input type="submit" value="Iniciar sesion" class="bg-sky-600 text-white hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 rounded-lg">
            </form>  
        </div>

    </div>
@endsection