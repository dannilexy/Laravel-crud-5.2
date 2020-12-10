@extends('layouts.app')
@section('content')
<h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="panel well">
    <div class="panel-header">
        {{$post->title}}
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4 col-sm-4">
            <img style="height: 200px; width: 100%" src="/cover_images/{{$post->cover_image}}" alt="">
            </div>
            <div class="col-md-8 col-sm-8">
                <p class="card-text">{!!$post->body!!}</p>
                <small>Post Created at: {{$post->created_at}} by: {{$post->user->name}}</small><a href="./post/{{$post->id}}" class="btn btn-primary">Read More</a>
                 
            </div>
        </div>
        </div>
    </div>
        @endforeach
        {{$posts->links()}}
    @else
    <h3>No Posts</h3>
    @endif

    

@endsection