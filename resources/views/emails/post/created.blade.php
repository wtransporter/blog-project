@component('mail::message')
# New post on our blog

{{ $post->author->name }} published a new post:<br>
{{ $post->title }}

@component('mail::button', ['url' => route('posts.show', $post->slug)])
Read
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
