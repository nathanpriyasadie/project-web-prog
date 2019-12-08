@extends('layouts.nav')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <h1>{{$figure->name}}</h1>
            </div>
            <div class="row">
                <div class="col">
                    @if($figure->photo_profile!=NULL)
                        <img src ="{{asset('storage/'.$figure->photo_profile)}}" style="height:500px;width:300px">
                    @endif
                </div>
                <div class="col">
                    <b>Category: </b>{{$figure->category->name}}<br>
                    <b>Description: </b>{{$figure->description}}<br>
                    <b>Stock: </b>{{$figure->stock}}<br>
                    <b>Price: </b>{{$figure->price}}<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
