@extends('layouts.base')

@section('title', 'create posts')

@section('content')

    <h2>Edit post</h2>

    <form method="post" action="{{route('posts.update', compact('post'))}}">
        @csrf 
        @method('PUT')
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Title..." value="{{$post->title}}">
        </div>
        <div class="form-group">
          <label for="text">Text</label>
          <textarea class="form-control" id="text" name="text" rows="3" placeholder="Text...">{{$post->text}}</textarea>
        </div>
        <div class="form-group">
          <label for="author_id">Author</label>
          <select class="form-control" id="author" name="author_id">
                {{-- <option selected="true" disabled>{{$post->author->info->name}}</option> --}}
            	@foreach($authors as $author)
                    <option value="{{$author->id}}"  {{$post->author->id === $author->id ? 'selected' : ''}}>{{$author->info->name}}</option>
                @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="id">Tags</label>
          <select class="form-control" id="tag" name="tags[]" multiple>
            	@foreach($tags as $tag)
                    <option value="{{$tag->id}}"  
                        @foreach($post->tags as $postTag) 
                            @if ($postTag->id === $tag->id) 
                                selected
                            @endif
                        @endforeach
                    >{{$tag->name}}</option>
                @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

      <a href="{{route('posts.index')}}" class="btn btn-primary my-2">Back to posts list</a>

@endsection