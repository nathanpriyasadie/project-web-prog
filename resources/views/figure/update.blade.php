@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Update Figure</h1>
    <form method="POST" action="/update-figure/{{$figure->id}}" enctype="multipart/form-data">
        @csrf
        <!-- Form Inputs -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="name" value="{{$figure->name}}">
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price" placeholder="Price" value="{{$figure->price}}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" rows="5" placeholder="description"> {{$figure->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" name="stock" placeholder="Stock" value="{{$figure->stock}}">
        </div>

        <div class="form-group">
            <label for="photo_profile">Post Image</label>
            <input type="file" class="form-control-file" id="photo_profile" name="photo_profile">
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
