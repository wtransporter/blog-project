@props(['category'])

<a style="font-size: 10px;" class="uppercase text-xs border border-blue-300 text-blue-300 px-3 py-1 rounded-full" 
    href="/?category={{ $category->slug }}">
    {{ $category->name }}
</a>