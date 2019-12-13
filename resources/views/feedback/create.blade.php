@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>New Feedback</h1>
            <form method="POST" action="/create-feedback" enctype="multipart/form-data">
                @csrf
                <!-- Form Inputs -->
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" placeholder="Feedback"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
            @if($errors->any())
        <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            {{$error}} <br>
        @endforeach
        </div>
    @endif
@endsection
