@extends('Layouts.layout')
@section('title')
    <title>Recipei Details</title>
@endsection
@section('body')
    <div class="flex justify-between align-center">
        <div class="w-full max-w-sm m-2">
            <h2 class="text-2xl my-2">Recipe Details:</h2>
            <div class="bg-white border-2 border-gray-400 rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">
                        {{ $recipe->name }}
                    </div>
                    <div class="flex justify-center">
                        <img src="{{ asset('images/food1.jpg') }}" alt="food1" class="w-full">
                    </div>

                    <p class="text-gray-700 text-base mt-4">
                        {{ $recipe->description }}
                    </p>
                </div>
            </div>
            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4">Delete
                    recipe</button>
            </form>
        </div>
        <div class="px-4 py-4 flex-1">
            <h3 class="text-2xl mb-3">Ingredients List:</h3>
            <ul>
                @foreach ($ingredients as $ingredient)
                    <li class="bg-green-500 p-3 rounded text-xl text-white text-center my-2">{{ $ingredient->name }}</li>
                @endforeach

                @if ($ingredients->isEmpty())
                    <li class="bg-red-500 p-3 rounded text-xl text-white text-center my-2">No ingredient found</li>
                @endif
            </ul>
        </div>

    </div>
@endsection
