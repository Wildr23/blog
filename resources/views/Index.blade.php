@extends('Layout')

@section('body')
<!-- Page Content -->
<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <h1 class="my-10">Page Heading
            <small>Secondary Text</small>
        </h1>

        <!-- Blog Posts -->
        @foreach ($posts as $item)
        <div class="card mb-4">
            <img class="card-img-top" src="{{Storage::url($item->img)}}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{$item->title}}</h2>
                <p class="card-text">{{$item->body}}</p>
                <a href="{{route('post',$item->id)}}" class="btn btn-raised btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted: {{$item->created_at}}<br>
                Autor: <a href="{{route('posts_by_autor',$item->autor->key)}}">{{$item->autor->name}}</a><br>
                Category: @foreach ($item->categories as $category)
                <a href="{{route('posts_by_category', $category->key)}}">{{$category->categories}}</a>
                @endforeach
            </div>
        </div>
        @endforeach

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            {{$posts->links()}}
        </ul>

    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled mb-0">
                            @foreach ($categories as $item)
                            <li>
                                <a href="{{route('posts_by_category',$item->key)}}">{{$item->categories}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
                You can put anything you want inside of these side widgets. They are easy to use, and feature the new
                Bootstrap 4 card containers!
            </div>
        </div>
        <!-- Floating Action Button -->

        <button class="btn btn-primary bmd-btn-fab" type="button" style="position: fixed; bottom:1em;  right: 1em;"
            onclick="location.href='{{route('new_post')}}'">
            <i class="material-icons">add</i>
        </button>

    </div>

</div>
<!-- /.row -->
@endsection
