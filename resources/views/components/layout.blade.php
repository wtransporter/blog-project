<!DOCTYPE html>

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="//unpkg.com/alpinejs" defer></script>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between lg:items-center border-b border-gray-500 border-opacity-30 pb-8">
            <div>
                <a href="/">
                    <img class="h-10" src="{{ asset('img/logo.png') }}" alt="Logo">
                </a>
            </div>
            <div class="mt-8 md:mt-0 flex items-center text-blue-500">
                @auth
                    @if (Auth::user()->is_admin)
                        <a href="{{ route('posts.index') }}" 
                            class="text-xs text-gray-700 {{ request()->routeIs('posts.index') ? 'underline' : '' }} hover:underline mr-4 flex items-center">Dashboard</a>
                    @endif

                    <x-cat-dropdown>
                        <x-slot name="trigger">
                            <div>
                                <button class="hover:text-blue-700 hover:underline flex">
                                    {{ auth()->user()->name }}
                                    <svg class="transform -rotate-90 pointer-events-none" style="right: 12px;" width="22" height="22" viewBox="0 0 22 22">
                                        <g fill="none" fill-rule="evenodd">
                                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                            </path>
                                            <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </x-slot>

                        <div>
                            <x-dropdown-item href="{{ route('profile.edit', auth()->user()->username) }}" 
                                :active="request()->routeIs('profile.edit')"
                                class="text-sm font-semibold mr-4 flex items-center">Profile</x-dropdown-item>
                            <x-dropdown-item href="{{ route('bookmarks') }}" 
                                :active="request()->routeIs('bookmarks')"
                                class="text-sm font-semibold mr-4 flex items-center">Bookmarks</x-dropdown-item>
                            <x-dropdown-item href="{{ route('followers.index') }}" 
                                :active="request()->routeIs('followers.index')"
                                class="text-sm font-semibold mr-4 flex items-center">Following</x-dropdown-item>
                            <x-dropdown-item class="cursor-pointer border-t border-gray-300" 
                                x-data={} @click.prevent="document.querySelector('#logout-form').submit();">
                                Logout
                            </x-dropdown-item>
                            <form id="logout-form" action="/logout" method="POST" class="text-xs hidden">
                                @csrf
                                {{-- <button class="uppercase text-xs font-bold" href="/logout">Log Out</button> --}}
                            </form>
                        </div>
                    </x-cat-dropdown>
                @else
                    <a class="uppercase text-xs font-bold" href="/register">Register</a>
                    <a class="uppercase text-xs font-bold ml-4" href="/login">Log In</a>
                @endauth
                <a class="bg-blue-500 text-white ml-3 py-3 px-5 rounded-full uppercase text-xs font-semibold" href="#newsletter">Subscribe For Updates</a>
            </div>
        </nav>

        {{ $slot }}

        <footer class="text-center bg-gray-100 rounded-xl border border-black border-opacity-5 py-16 px-10 mt-16">
            <img class="h-28 mx-auto" src="{{ asset('img/avatar.png') }}" alt="Avatar">
            <div class="flex flex-col items-center">
                <h2 class="text-3xl">Follow updates about our latest blog posts</h2>
                <span class="text-sm mt-3">We will not be anoying.</span>
            </div>
            <div id="newsletter" class="mt-8">
                <div class="relative inline-block lg:bg-gray-200 mx-auto text-sm rounded-full">
                    <form action="/newsletter" method="POST" class="lg:flex items-center">
                        @csrf
                        <div class="lg:flex">
                            <input name="email" class="py-3 px-5 lg:bg-transparent focus-within:outline-none" 
                                type="email"
                                id="email"
                                placeholder="Your e-mail address"
                                required>
                        </div>
                        <button class="lg:-ml-10 py-3 px-8 rounded-full font-semibold uppercase text-white transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0" href="" type="submit">
                            Subscribe
                        </button>
                    </form>
                </div>
                <x-input-error for="email" />
            </div>
        </footer>
    </section>
    <x-flash-message />
</body>