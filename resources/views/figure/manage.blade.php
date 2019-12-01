<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Manage Figure</h1>
        <table>
            <tr>
                <th>Figure Picture</th>
                <th>Figure Name</th>
                <th>Figure Category</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($figures as $figure)
            <tr>
                <td>
                    @if($figure->photo_profile!=NULL)
                    <img src ="{{asset('storage/'.$figure->photo_profile)}}" style="height:100px;width:100px">
                    @endif
                </td>
                <td>{{$figure->name}}</td>
                <td>{{$figure->category->name}}</td>
                <td>{{$figure->description}}</td>
                <td>{{$figure->stock}}</td>
                <td>{{$figure->price}}</td>
                <td>
                    <form method="GET" action='/delete-figure/{{$figure->id}}'>
                        <input type="submit" value="Delete" />
                    </form>
                </td>
                <td>
                    <form method="GET" action='/update-figure/{{$figure->id}}'>
                        <input type="submit" value="Edit" />
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
