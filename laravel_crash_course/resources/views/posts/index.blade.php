@extends('layouts.app')

@section('content')
<div class="container">
<h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                        @if($post->cover_image)
                            <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                        @else
                            <img style="width:100%" src="/storage/cover_images/noimage.jpg">
                        @endif                        
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                            <small>Written on {{$post->created_at}}
                            @if($post->user)
                                by {{$post->user->name}}
                            @endif                            
                            </small>
                        </div>
                    </div>                
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
</div>
@endsection

<style>
    .card {
        margin-top: 5px;
    }
</style>