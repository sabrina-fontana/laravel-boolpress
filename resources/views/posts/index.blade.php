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
                <th scope="col">Tags</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($posts as $post)  
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('posts.show', compact('post'))}}">{{$post->title}}</a></td>
                    <td>{{$post->text}}</td>
                    <td>{{$post->author->info->name}}</td>
                    <td>
                        @foreach ($post->tags as $tag)
                            {{$tag->name}}
                        @endforeach
                    </td>
                    <td>
                        <button class="btn btn-success my-1" href="{{route('posts.show', compact('post'))}}">Show</button>
                        <button class="btn btn-warning my-1" href="{{route('posts.edit', compact('post'))}}">Edit</button>
                        <form method="post" action="{{route('posts.destroy', compact('post'))}}">
                            @csrf  
                            @method('DELETE')
                            <button class="btn btn-danger my-1" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{route('posts.create')}}" class="btn btn-primary">New post</a>

@endsection