@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-info">Go Back</a>
    <h1>{{$post->title}}</h1>
    <div>
    @if($post->cover_image)
        <img style="width:30%" src="/storage/cover_images/{{$post->cover_image}}">
    @else
        <img style="width:30%" src="/storage/cover_images/noimage.jpg">
    @endif
    <br><br>
    {!!$post->body!!}
    </div>
    <small>Written on {{$post->created_at}} 
    @if($post->user)
        by {{$post->user->name}}
    @endif    
    </small>

    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <div class="row" style="margin-left: 2px">
            <a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a>

            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'col'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            </div>
        @endif
    @endif
@endsection