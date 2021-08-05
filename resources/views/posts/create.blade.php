<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Create new Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/admin/posts" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-input-error for="slug" />
                        <label class="block mt-4 uppercase font-semibold text-xs text-gray-700" for="title">
                            Title
                        </label>
                        
                        <input class="border border-gray-400 focus:border-blue-300 p-2 w-full rounded focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none"
                            type="text" name="title" id="title" required value="{{ old('title') }}">
                        @error('title')
                            <p class="text-xs text-red-500 italic mt-2" for="title">{{ $message }}</p>
                        @enderror

                        <label class="block mt-4 uppercase font-semibold text-xs text-gray-700" for="excerpt">
                            Excerpt (Short description)
                        </label>
                        
                        <textarea class="border border-gray-400 focus:border-blue-300 p-2 w-full rounded focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none"
                            type="text" name="excerpt" id="excerpt" rows="3" required>{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <p class="text-xs text-red-500 italic mt-2" for="excerpt">{{ $message }}</p>
                        @enderror

                        <label class="block mt-4 uppercase font-semibold text-xs text-gray-700" for="body">
                            Body
                        </label>
                        
                        <textarea class="border border-gray-400 focus:border-blue-300 p-2 w-full rounded focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none"
                            type="text" name="body" id="body" rows="5" required>{{ old('body') }}</textarea>
                        @error('body')
                            <p class="text-xs text-red-500 italic mt-2" for="body">{{ $message }}</p>
                        @enderror

                        <label class="block mt-4 uppercase font-semibold text-xs text-gray-700" for="image">
                            Image
                        </label>
                        
                        <input class="border border-gray-400 p-2 w-1/3 rounded focus:ring-2 outline-none"
                            type="file" name="image" id="image" required>
                        @error('image')
                            <p class="text-xs text-red-500 italic mt-2" for="image">{{ $message }}</p>
                        @enderror

                        <label class="block mt-4 uppercase font-semibold text-xs text-gray-700" for="image">
                            Category
                        </label>
                        <select 
                            name="category_id" 
                            id="category_id" 
                            class="block border border-gray-400 p-2 w-1/3 rounded focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none">
                            <option value="0">Choose</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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