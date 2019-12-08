@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form action="/login" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{Cookie::get('user_email')}}">
                        </div>
                        <div class="form-group">
                            <input type="password" name = "password" class="form-control" placeholder="Password" value="{{Cookie::get('user_password')}}">
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                    {{$error}} <br>
                                @endforeach
                            </div>
                        @endif
                        <input type="checkbox" name="remember">Remember me<br>
                        <input type="submit" value = "Login" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
