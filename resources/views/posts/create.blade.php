<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/admin/posts" method="POST">
                        @csrf
                        <label class="block mt-4 uppercase font-semibold text-xs text-gray-700" for="title">
                            Title
                        </label>
                        
                        <input class="border border-gray-400 focus:border-blue-300 p-2 w-full rounded focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none"
                            type="text" name="title" id="title" required>
                        @error('title')
                            <p class="text-xs text-red-500 italic mt-2" for="title">{{ $message }}</p>
                        @enderror

                        <label class="block mt-4 uppercase font-semibold text-xs text-gray-700" for="excerpt">
                            Excerpt (Short description)
                        </label>
                        
                        <textarea class="border border-gray-400 focus:border-blue-300 p-2 w-full rounded focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none"
                            type="text" name="excerpt" id="excerpt" rows="3" required></textarea>
                        @error('excerpt')
                            <p class="text-xs text-red-500 italic mt-2" for="excerpt">{{ $message }}</p>
                        @enderror

                        <label class="block mt-4 uppercase font-semibold text-xs text-gray-700" for="body">
                            Body
                        </label>
                        
                        <textarea class="border border-gray-400 focus:border-blue-300 p-2 w-full rounded focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none"
                            type="text" name="body" id="body" rows="5" required></textarea>
                        @error('body')
                            <p class="text-xs text-red-500 italic mt-2" for="body">{{ $message }}</p>
                        @enderror

                        <select 
                            name="category_id" 
                            id="category_id" 
                            class="block border border-gray-400 p-2 w-1/3 rounded focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none">
                            <option value="0">Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-primary-button class="mt-4">
                            Submit
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>