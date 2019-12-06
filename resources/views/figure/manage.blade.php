@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Manage Figure</h1>
        <form method="GET" action='/create-figure'>
            <input type="submit" value="Create figure" class="btn btn-primary"/>
        </form>
        <table class="table table-striped">
            <tr>
                <th>Figure Picture</th>
                <th>Figure Name</th>
                <th>Figure Category</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Delete</th>
                <th>Edit</th>
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
                        <input type="submit" value="Delete" class="btn btn-danger"/>
                    </form>
                </td>
                <td>
                    <form method="GET" action='/update-figure/{{$figure->id}}'>
                        <input type="submit" value="Edit" class="btn btn-warning"/>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{$figures->links()}}
    </div>
</div>
</div>
@endsection
