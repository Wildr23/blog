@extends('Layout')

@section('body')

@guest
<div class="col-md-10">
    <h1 class="my-4"> You need to login first!</h1>
    <a class="btn btn-raised btn-primary" href="{{route('login')}}">Login</a>
    <a class="btn btn-raised btn-primary" href="{{route('register')}}">Register</a>
</div>
@else
<form>
    <div class="form-group">
        <label for="exampleFormControlFile1">Choose the Image</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Post text</span>
        </div>
        <textarea rows="6" class="form-control" aria-label="With textarea"></textarea>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-raised btn-primary">Post</button>
        </div>
    </div>
</form>
@endguest

</div>
@endsection
