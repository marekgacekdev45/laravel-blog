<x-layout>
    @foreach ($posts as $post)
        <article>
            <h1><a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}</a></h1>
                    By <a href="/authors/{{$post->author->username}}"> {{$post->author->name}}</a> <a href="/categories/{{$post->category->slug}}">{{ $post->category->name }}</a>
            <div>{{ $post->excerpt }}</div>
        </article>
    @endforeach
</x-layout>

<?php

