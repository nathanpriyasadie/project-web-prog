@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Manage Category</h1>
        <form method="GET" action='/create-category'>
            <input type="submit" value="Create Category" class="btn btn-primary"/>
        </form>
        <table class="table table-striped">
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
                        <input type="submit" value="Delete" class="btn btn-danger" />
                    </form>
                </td>
                <td>
                    <form method="GET" action='/update-category/{{$category->id}}'>
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

