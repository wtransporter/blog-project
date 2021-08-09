<div x-data="{ show: false}" @click.away="show = false">
    <div @click="show = ! show">
        {{ $trigger }}
    </div>

    <div x-show="show" class="py-2 mt-2 absolute bg-gray-100 z-50 rounded-xl w-32 max-h-52 overflow-auto" style="display: none">
        {{ $slot }}
    </div>
</div>