<x-layout>
    <x-slot name="title">
        <title>{{ $post->title }}</title>
    </x-slot>
    <article>
        <h1>{{ $post->title }}</h1>

        {{-- <a href="#">{{ $post->author?->name }}</a> --}}
        <a href="{{ route('authors.posts'), ['author' => $post->author?->username] }}">{{ $post->author?->name }}</a>
        {{-- <a href="/authors/{{ $post->author?->id }}">{{ $post->author?->name }}</a> --}}

        <a href="{{ route('categories.posts', ['category' => $post->category?->slug]) }}">
            {{ $post->category?->name }}
        </a>

        <div>
            {!! $post->body !!}
        </div>

        <a href="{{ route('posts.index') }}">Back to list</a>
    </article>
</x-layout>
