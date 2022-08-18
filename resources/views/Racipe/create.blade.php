@extends('Layouts.layout')
@section('title')
    <title>Recipe create form</title>
@endsection

@section('body')
    <div class="flex m-4">
        <a href="{{ route('recipes.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Back to Recipe List
        </a>
    </div>
    <div class="flex flex-wrap justify-center mb-16">
        <div class="w-full max-w-sm m-2">
            <div class="bg-white border-2 border-gray-400 rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">
                        Create Recipe
                    </div>
                    <form action="{{ route('recipes.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Name
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="name" name="name" type="text" placeholder="Name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Instructions
                            </label>
                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                id="instruction" name="instruction" type="text" placeholder="Instruction">{{ old('instruction') }}</textarea>
                            @error('instruction')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Description
                            </label>
                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                id="description" name="description" type="text" placeholder="Description">{{ old('description') }}
                            </textarea>
                            @error('description')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="ingradients">
                                Ingradients
                            </label>
                            {{-- multiple select ingredient list using talwind css --}}
                            <div class="relative mb-8">
                                <select
                                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                    id="ingradients" name="ingradients[]" multiple>
                                    @foreach ($ingredients as $ingredient)
                                        <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                    @endforeach
                                </select>
                                @error('ingradients')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex items-center justify-between">
                                <button class="w-full bg-green-500 hover:green-700 text-white font-bold py-2 px-4 rounded"
                                    type="submit">
                                    Create
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
