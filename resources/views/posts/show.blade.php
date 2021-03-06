@extends('layouts.base')

@section('title', 'show posts')

@section('content')

    <div class="card">
        <div class="card-body">
            <img src="{{$post->image !== null ? asset($post->image) : ''}}" width="400px">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">
                tag: 
                @foreach ($post->tags as $tag)
                    {{$tag->name}} 
                @endforeach
            </p>
            <p class="card-text">{{$post->text}}</p>
            <p class="card-text">{{$post->author->info->name}}</p>
            <a href="{{route('posts.edit', compact('post'))}}" class="btn btn-warning">Edit</a>
            <a href="{{route('authors.show', ['author'=>$post->author->id])}}" class="btn btn-primary">Go to the author</a>
            <a href="{{route('posts.index')}}" class="btn btn-primary">Back to posts list</a>
        </div>
    </div>

@endsection