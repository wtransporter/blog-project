@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'italic text-red-700 text-xs mt-2']) }}>
        {{ $message }}
    </p>
@enderror