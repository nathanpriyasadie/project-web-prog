<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Manage Category</h1>
        <table>
            <tr>
                <th>Category Name</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>
                    <form method="GET" action='/delete-category/{{$category->id}}'>
                        <input type="submit" value="Delete" />
                    </form>
                </td>
                <td>
                    <form method="GET" action='/update-category/{{$category->id}}'>
                        <input type="submit" value="Edit" />
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
