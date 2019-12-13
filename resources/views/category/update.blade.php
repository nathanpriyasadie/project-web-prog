@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
    <h1>Edit Category</h1>
    <form method="POST" action="/update-category/{{$category->id}}" enctype="multipart/form-data">
        @csrf
        <!-- Form Inputs -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Category Name" value="{{$category->name}}">
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>

    </form>
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            {{$error}} <br>
        @endforeach
        </div>
    @endif
@endsection
