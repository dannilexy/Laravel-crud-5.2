@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <a href="/post/create" class="btn btn-primary">Create Post</a>
                <h3>Your Blog Posts</h3>

                <div class="panel-body">
                    @if (count($posts)>0)
                <table class="table table-stripped">
                    <tr>
                        <th>Title</th>
                        <th></th>
                        <th></th>
                    </tr>
                    
                    @foreach ($posts as $post)
                    <tr>
                    <td>{{$post->title}}</td>
                    <td><a href="/post/{{$post->id}}/edit" class="btn btn-default">edit</a></td>
                        <td>{!!Form::open(['action'=>['postController@destroy', $post->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                        {!!Form::close()!!}</td>
                    </tr>
                </table> 
                @endforeach
                    @else
                        <h3>No Posts found</h3>
                    @endif
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
