<!DOCTYPE html>

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between lg:items-center">
            <div>
                <a href="/">
                    <img class="h-10" src="{{ asset('img/logo.png') }}" alt="Logo">
                </a>
            </div>
            <div class="mt-8 md:mt-0">
                <a class="uppercase text-xs font-bold" href="/">Home page</a>
                <a class="bg-blue-500 text-white ml-3 py-3 px-5 rounded-full uppercase text-xs font-semibold" href="">Subscribe For Updates</a>
            </div>
        </nav>

        {{ $slot }}

        <footer class="text-center bg-gray-100 rounded-xl border border-black border-opacity-5 py-16 px-10 mt-16">
            <img class="h-28 mx-auto" src="{{ asset('img/avatar.png') }}" alt="Avatar">
            <div class="flex flex-col items-center">
                <h2 class="text-3xl">Follow updates about our latest blog posts</h2>
                <span class="text-sm mt-3">We will not be anoying.</span>
            </div>
            <div class="mt-8">
                <div class="relative inline-block lg:bg-gray-200 mx-auto text-sm rounded-full">
                    <form action="" method="POST" class="lg:flex items-center">
                        <div class="lg:flex">
                            <input class="py-3 px-5 lg:bg-transparent focus-within:outline-none" type="email" id="email" placeholder="Your e-mail address">
                        </div>
                        <button class="lg:-ml-10 py-3 px-8 rounded-full font-semibold uppercase text-white transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0" href="" type="submit">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
</body>