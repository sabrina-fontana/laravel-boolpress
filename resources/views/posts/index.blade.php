@extends('layouts.base')

@section('title', 'index posts')

@section('content')

    <h2>Posts</h2>
    <br>

    <table class="table table-hover">
        
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Text</th>
                <th scope="col">Author</th>
            </tr>
        </thead>

        <tbody>
            @foreach($posts as $post)  
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('posts.show', compact('post'))}}">{{$post->title}}</a></td>
                    <td>{{$post->text}}</td>
                    <td>{{$post->author->info->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{route('posts.create')}}" class="btn btn-primary">New post</a>

@endsection