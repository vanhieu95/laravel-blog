<x-layout>
    <x-slot name="title">
        <title>{{ $post->title }}</title>
    </x-slot>
    <article>
        <h1>{{ $post->title }}</h1>
        <div>
            {!! $post->body !!}
        </div>

        <a href="{{ route('posts.index') }}">Back to list</a>
    </article>
</x-layout>
