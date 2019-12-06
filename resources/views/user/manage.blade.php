@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-8">
        <h1>Manage User</h1>
        <form method="GET" action='/create-user'>
            <input type="submit" value="Create User" class="btn btn-primary"/>
        </form>
        <table class="table table-striped">
            <tr>
                <th>Profile Picture</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Role</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>
                    @if($user->photo_profile!=NULL)
                    <img src ="{{asset('storage/'.$user->photo_profile)}}" style="height:100px;width:100px">
                    @else
                    No Picture
                    @endif
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->type}}</td>
                <td>
                    <form method="GET" action='/delete-user/{{$user->id}}'>
                        <input type="submit" value="Delete" class="btn btn-danger" />
                    </form>
                </td>
                <td>
                    <form method="GET" action='/update-user/{{$user->id}}'>
                        <input type="submit" value="Edit" class="btn btn-warning" />
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        </div>
    </div>
</div>
@endsection
