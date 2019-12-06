@extends('Layout')

@section('body')

@guest
<div class="col-md-10">
    <h1 class="my-4"> You need to login first!</h1>
    <a class="btn btn-raised btn-primary" href="{{route('login')}}">Login</a>
    <a class="btn btn-raised btn-primary" href="{{route('register')}}">Register</a>
</div>
@else
<h2>Add a post</h2>
<form enctype="multipart/form-data" method="POST" action="/create">
    @csrf
    <div class="form-group row">
        <label for="postImage" class="col-sm-3 col-form-label">Post Image</label>
        <input type="hidden" class="MAX_FILE_SIZE" value="41943040">
        <input name="image" type="file" id="postImage" class="col-sm-9 form-control-file">
    </div>
    <div class="form-group row">
        <label for="postTitle" class="col-sm-3 col-form-label">Post Title</label>
        <input name="title" type="text" id="postTitle" class="col-sm-9 form-control" aria-label="Title"
            aria-describedby="basic-addon1">
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label" for="postCateory">Example select</label>
        <select class="col-sm-9 form-control" name="category" id="postCateory">
            @foreach ($categories as $item)
            <option>{{$item->categories}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group row">
        <label for="postText" class="col-sm-3 col-form-label">Post Title</label>
        <textarea name="text" rows="6" id="postText" class="col-sm-9 form-control"
            aria-label="With textarea"></textarea>
    </div>
    <div class="form-group row">
        <div class="offset-sm-3 col-md-10">
            <button type="submit" class="btn btn-raised btn-primary">Post</button>
        </div>
    </div>
</form>
@endguest

</div>
@endsection
