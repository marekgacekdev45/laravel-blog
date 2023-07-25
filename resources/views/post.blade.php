<x-layout>
    <article>
        <h2>{{ $post->title }}</h2>
        By <a href="/authors/{{$post->author->username}}"> {{$post->author->name}}</a> <a href="/categories/{{$post->category->slug}}">{{ $post->category->name }}</a>
        <div>{!! $post->body !!}</div>
    </article>
    <button><a href="/">back</a></button>
</x-layout>
