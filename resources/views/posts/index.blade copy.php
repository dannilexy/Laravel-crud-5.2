@extends('layout.app')
@section('content')
<h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card">
    <div class="card-header">
        {{$post->title}}
    </div>
    <div class="card-body">
        
        <p class="card-text">{{$post->body}}</p>
        <small>Post Created at: {{$post->created_at}}</small><a href="./post/{{$post->id}}" class="btn btn-primary">Read More</a>
    </div>
    </div>
        @endforeach
        {{$posts->links()}}
    @else
    <h3>No Posts</h3>
    @endif

    

@endsection