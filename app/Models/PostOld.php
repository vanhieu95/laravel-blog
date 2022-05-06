<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Str;

class Post
{
    public function __construct(
        public string $title,
        public string $slug,
        public string $excerpt,
        public string $date,
        public string $body
    ) {
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path('posts/')))
                ->map(fn ($file) => YamlFrontMatter::parseFile($file))
                ->map(fn ($document) => new Post(
                    $document->title,
                    Str::of($document->title)->slug(),
                    $document->excerpt,
                    $document->date,
                    $document->body()
                ))
                ->sortByDesc('date');
        });
        // return array_map(function ($file) {
        //     $document = YamlFrontMatter::parseFile($file);

        //     return new Post(
        //         $document->title,
        //         Str::of($document->title)->slug(),
        //         $document->excerpt,
        //         $document->date,
        //         $document->body()
        //     );
        // }, $files);
    }

    public static function find(string $slug)
    {
        return static::all()->firstWhere('slug', $slug);

        // $path = __DIR__ . "/../resources/posts/{$slug}.html";
        // base_path();
        // app_path();

        // if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
        // return to_route('posts.index');
        // return redirect()->route('posts.index');
        // return redirect('/');
        // abort('404');
        // }

        // return cache()->remember("posts.{$slug}", now()->addDay(), fn () => file_get_contents($path));
    }

    public static function findOrFail(string $slug)
    {
        $post = static::find($slug);

        if (!$post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }
}
