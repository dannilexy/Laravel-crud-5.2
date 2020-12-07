@extends('layout.app')
    @section('content')
    <a href="/post" class="btn btn-default">Go back</a>
    <h1>{{$post->title}}</h1>
    
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>written on: {{$post->created_at}}</small>
    @endsection