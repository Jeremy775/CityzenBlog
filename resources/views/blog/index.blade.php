@extends('layouts.navbar')

<div class="w-4/5 pt-20 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-4xl">
            Blog Posts
        </h1>
    </div>
</div>

@foreach ($posts as $post)
    <h2>
        {{ $post->title }}
    </h2>
    <small>Par {{ $post->user->name }}, le {{ date('jS M Y', strtotime($post->updated_at)) }}</small>
    <p>
        {{ $post->description }}
    </p>
    <span>
        <a href="/blog/{{ $post->slug }}" class="text-blue-500">show more</a>
    </span>
@endforeach