<x-layout>
    <x-slot name="title">
        <title>My Blog List</title>
    </x-slot>
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="{{ route('posts.show', ['post' => $post->slug]) }}">{{ $post->title }}</a>
            </h1>
            <div>
                {!! $post->excerpt !!}
            </div>
        </article>
    @endforeach
</x-layout>
