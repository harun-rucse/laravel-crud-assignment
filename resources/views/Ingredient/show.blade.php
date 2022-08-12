@extends('Layouts.layout')
@section('title')
    <title>Ingredient Details</title>
@endsection
@section('body')
    <div class="flex justify-between align-center">
        <div class="w-full max-w-sm m-2">
            <h2 class="text-2xl my-2">Ingredient Details:</h2>
            <div class="bg-white border-2 border-gray-400 rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">
                        {{ $ingredient->name }}
                    </div>
                    <div class="flex justify-center">
                        <img src="{{ asset('images/food1.jpg') }}" alt="food1" class="w-full">
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 py-4 flex-1">
            <h3 class="text-2xl mb-3">Recipe List:</h3>
            <ul>
                @foreach ($ingredient->recipes as $recipe)
                    <li class="bg-green-500 p-3 rounded text-xl text-white text-center my-2">{{ $recipe->name }}</li>
                @endforeach
                @if ($ingredient->recipes->isEmpty())
                    <li class="bg-red-500 p-3 rounded text-xl text-white text-center my-2">No recipe found</li>
                @endif

            </ul>
        </div>

    </div>
@endsection
