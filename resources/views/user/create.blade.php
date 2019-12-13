@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Create User</div>
            <div class="card-body">

    <form method="POST" action="/create-user-admin" enctype="multipart/form-data">
        @csrf
        <!-- Form Inputs -->
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" name="name" placeholder="Full Name">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" placeholder="phone">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" name="address" rows="5" placeholder="Address"></textarea>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender">
                <option value="male">male</option>
                <option value="female">female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="type">Role</label>
            <select name="type">
                <option value="admin">admin</option>
                <option value="user">user</option>
            </select>
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
        </div>
        </div>
        </div>
    </div>
</div>
@endsection
