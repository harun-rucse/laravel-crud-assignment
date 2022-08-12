@extends('Layouts.layout')
@section('title')
    <title>Ingredient lists</title>
@endsection
@section('body')
    <div class="flex flex-wrap justify-center">
        @foreach ($ingredients as $ingredient)
            <div class="w-full max-w-sm m-2">
                <div class="bg-white border-2 border-gray-400 rounded-lg shadow-md overflow-hidden">
                    <div class="p-1">
                        <div class="flex justify-center">
                            <img src="{{ asset('images/food1.jpg') }}" alt="food1" class="w-full">
                        </div>
                        <div class="flex flex-col justify-center mb-2">
                            <div class="font-bold text-xl text-center px-6 py-4">
                                {{ $ingredient->name }}
                            </div>
                            <a href="{{ route('ingredients.show', $ingredient->id) }}"
                                class="self-center inline-block bg-red-500 rounded-full px-3 py-1 text-sm font-semibold hover:bg-red-600 text-white mr-2">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
