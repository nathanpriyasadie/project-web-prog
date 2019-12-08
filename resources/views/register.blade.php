@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Signup</div>
                <div class="card-body">
                    <form method="POST" action="/register" enctype="multipart/form-data">
                        @csrf
                        <!-- Form Inputs -->
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Full Name">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Phone">
                        </div>

                        <div class="form-group">
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
                            <label for="photo_profile">Post Image</label>
                            <input type="file" class="form-control-file" id="photo_profile" name="photo_profile">
                        </div>

                        <input type="checkbox" name="agree" value="agree">I Agree to Terms and Condition<br>

                        <button type="submit" class="btn btn-primary">Signup</button>
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
