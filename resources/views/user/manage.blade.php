<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Manage User</h1>
        <table>
            <tr>
                <th>Profile Picture</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Role</th>
                <th>Delete</th>
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
                <td>{{$user->role}}</td>
                <td>
                    <form method="GET" action='/delete-user/{{$user->id}}'>
                        <input type="submit" value="Delete" />
                    </form>
                </td>
                <td>
                    <form method="GET" action='/update-user/{{$user->id}}'>
                        <input type="submit" value="Edit" />
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
