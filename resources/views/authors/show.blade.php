@extends('layouts.base')

@section('title', 'show authors')

@section('content')

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{$author->info->pic}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$author->info->name}}</h5>
            <p class="card-text">Username: {{$author->username}}</p>
            <p class="card-text">Mail: {{$author->mail}}</p>
            <a href="{{route('authors.index')}}" class="btn btn-primary">Back to authors list</a>
        </div>
    </div>

@endsection