<x-layout>
    <section class="max-w-6xl mx-auto">
        <x-card-panel class="mt-8">
            <h1 class="py-10 text-center text-5xl">
                Edit Profile
            </h1>
        </x-card-panel>
    </section>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <x-form.input name="name" :value="$user->name" required/>
                        <x-form.input name="username" :value="$user->username" required/>
                        <x-form.input name="email" :value="$user->email" />

                        {{-- <div class="flex max-w-md">
                            <div class="flex-1">
                                <x-form.input name="image" type="file" />
                            </div>
                            <img class="rounded-xl ml-4" src="{{ asset($user->image ? 'storage/'.$post->image : 'img/image4.png') }}" width="100" alt="Image 1">
                        </div> --}}

                        <x-form.input name="password" type="password" />
                        <x-form.input label="Password confirm" name="password_confirmation" type="password" />
                        <x-primary-button class="mt-4">
                            Submit
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>