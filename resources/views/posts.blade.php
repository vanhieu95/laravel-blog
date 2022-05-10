<x-layout>
    <x-slot name="title">
        <title>My Blog List</title>
    </x-slot>
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="{{ route('posts.show', ['post' => $post->slug]) }}">{{ $post->title }}</a>
            </h1>

            {{-- <a href="#">{{ $post->author?->name }}</a> --}}
            {{-- <a href="{{ route('authors.posts'), ['author' => $post->author?->id] }}">{{ $post->author?->name }}</a> --}}
            <a href="/authors/{{ $post->author?->username }}">{{ $post->author?->name }}</a>

            <a href="{{ route('categories.posts', ['category' => $post->category?->slug]) }}">
                {{ $post->category?->name }}
            </a>

            <div>
                {!! $post->excerpt !!}
            </div>
        </article>
    @endforeach
</x-layout>
