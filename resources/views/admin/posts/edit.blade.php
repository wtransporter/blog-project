<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Edit Post') . ': ' . $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <x-input-error for="slug" />
                        <x-form.input name="title" :value="$post->title" required/>

                        <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
                        <x-form.textarea name="body" rows="5">{{ old('body', $post->body) }}</x-form.textarea>

                        <div class="flex max-w-md">
                            <div class="flex-1">
                                <x-form.input name="image" type="file" />
                            </div>
                            <img class="rounded-xl ml-4" src="{{ asset($post->image ? 'storage/'.$post->image : 'img/image4.png') }}" width="100" alt="Image 1">
                        </div>

                        <label class="block mt-4 uppercase font-semibold text-xs text-gray-700" for="image">
                            Category
                        </label>
                        <select 
                            name="category_id" 
                            id="category_id" 
                            class="block border border-gray-400 p-2 w-1/3 rounded focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none">
                            <option value="0">Choose</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
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