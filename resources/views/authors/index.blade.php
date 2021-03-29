@extends('layouts.base')

@section('title', 'index authors')

@section('content')

    <h2>Authors</h2>
    <br>

    <table class="table table-hover">
        
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Mail</th>
                <th scope="col">Name</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Pic</th>
            </tr>
        </thead>

        <tbody>
            @foreach($authors as $author)  
                <tr>
                    <td>{{$author->id}}</td>
                    <td>{{$author->username}}</td>
                    <td>{{$author->mail}}</td>
                    <td><a href="{{route('authors.show', compact('author'))}}">{{$author->info->name}}</a></td>
                    <td>{{$author->info->birthdate}}</td>
                    <td><img src="{{$author->info->pic}}"></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection