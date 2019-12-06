@extends('Layout')

@section('body')


<div class="col-md-10">

    <h1 class="my-4">{{$post->title}}
        <small>Posted by <a href="{{route('posts_by_autor',$post->autor->key)}}">{{$post->autor->name}}</a></small>
    </h1>

    <!-- Blog Post -->
    <div class="card mb-4">
        <img class="card-img-top" src="{{Storage::url($post->img)}}" alt="Card image cap">
        <div class="card-body">
            <p class="card-text">{{$post->body}}</p>
        </div>
        <div class="card-footer text-muted">
            Posted: {{$post->created_at}}<br>
            Autor: <a href="{{route('posts_by_autor',$post->autor->key)}}">{{$post->autor->name}}</a><br>
            Category: @foreach ($post->categories as $category)
            <a href="{{route('posts_by_category', $category->key)}}">{{$category->categories}}</a>
            @endforeach
        </div>
    </div>
    @guest
    @else
    <!--Comment Area-->
    <div class="form-group">
        <label for="Comment">Comment:</label>
        <textarea class="form-control" id="Comment" rows="5"></textarea>
        <input class="btn btn-raised btn-primary" type="submit" value="Post">
    </div>
    @endguest
    <!--Comments-->
    <div class="card mb-4">
        <div class="card-footer">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
            <input class="btn btn-raised btn-primary float-right" type="button" value="Like">
        </div>
    </div>
</div>
@endsection
