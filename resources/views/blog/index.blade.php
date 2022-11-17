@extends('layouts.navbar')

<div class="w-4/5 pt-20 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-4xl">
            Blog Posts
        </h1>
    </div>
</div>

@if (session()->has('message'))
    <div class="text-green-300">
        {{ session()->get('message') }}
    </div>
@endif

@if (Auth::check())
    <div class="mb-7">
        <a href="/blog/create" class="text-blue-500 text-3xl">Créer un post</a>
    </div>
@endif

@foreach ($posts as $post)
    <h2>
        {{ $post->title }}
    </h2>
    <small>Par {{ $post->user->name }}, le {{ date('jS M Y', strtotime($post->updated_at)) }}</small>
    <p>
        <img src="{{ asset('images/' . $post->image_path) }}" class="h-32" alt="">
        {{ $post->description }}
    </p>
    <span>
        <a href="/blog/{{ $post->slug }}" class="text-blue-500">Voir</a>
    </span>

    @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
        <span class="text-green-400">
            <a href="/blog/{{ $post->slug }}/edit">Modifier</a>
        </span>

        <span>
            <form 
               action="/blog/{{ $post->slug }}"
               method="POST">
               @csrf
               @method('delete')

               <button
                   class="text-red-500 pr-3"
                   type="submit">
                   Supprimer
               </button>

           </form>
       </span>
    @endif
@endforeach