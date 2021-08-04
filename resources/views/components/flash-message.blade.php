@if (session()->has('success'))
    <div x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            class="fixed bottom-5 right-3 p-2 bg-green-500 text-white text-sm text-center rounded font-semibold">
        <p>{{ session('success') }}</p>
    </div>
@endif