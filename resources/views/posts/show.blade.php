@extends('layouts.app')
    @section('content')
    <a href="/post" class="btn btn-default">Go back</a>
    <h1>{{$post->title}}</h1>
    
    <div class="panel well">
        {!!$post->body!!}
    </div>
    <hr>
    <small>written on: {{$post->created_at}}</small>
    <hr>
    <a href="/post/{{$post->id}}/edit" class="btn btn-default">Edit</a>
    {!!Form::open(['action'=>['postController@destroy', $post->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}
    @endsection