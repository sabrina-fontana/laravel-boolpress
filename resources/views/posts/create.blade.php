@extends('layouts.base')

@section('title', 'create posts')

@section('content')

    <h2>Create a post</h2>

    <form method="post" action="{{route('posts.store')}}">
        @csrf 
        @method('POST')
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Title...">
        </div>
        <div class="form-group">
          <label for="text">Text</label>
          <textarea class="form-control" id="text" name="text" rows="3" placeholder="Text..."></textarea>
        </div>
        <div class="form-group">
          <label for="date">Date</label>
          <input type="date" class="form-control" id="date" name="date"></input>
        </div>
        <div class="form-group">
          <label for="author_id">Author</label>
          <select class="form-control" id="author" name="author_id">
            	@foreach($authors as $author)
                    <option value="{{$author->id}}">{{$author->info->name}}</option>
                @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

      <a href="{{route('posts.index')}}" class="btn btn-primary my-2">Back to posts list</a>

@endsection