@extends('layouts.app')
@section('content')
    <h1 class="text-center">Edit Posts</h1>
    {!! Form::open(['action'=>['postController@update', $post->id], 'method'=>'POST', 'enctype'=> 'multipart/form-data' ]) !!}
    <div class="form-group">
    {{Form::label('title', 'Title', ['class'=>'control-label'])}}
    {{Form::text('title', $post->title, ['class'=>'form-control', 'placeholder'=> 'Blog Title'])}}
    </div>
    <div class="form-group">
    {{Form::label('body', 'Body', ['class'=>'control-label'])}}
    {{Form::textarea('body', $post->body, ['class'=>'form-control', 'placeholder'=> 'Blog Body', 'id' => 'article-ckeditor'])}}
    </div>
    <div class="form-group">
        {{Form::label('cover_image', 'Cover_image', ['class'=>'control-label'])}}
        {{Form::file('cover_image',['class'=>'form-control'])}}
       
    </div>
    {{Form::submit('submit', ['class'=>'btn btn-primary'])}}
    {{Form::hidden('_method', 'PUT')}}
{!! Form::close() !!}

@endsection