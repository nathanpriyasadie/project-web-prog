@extends('layouts.nav')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Mimi Figure Shop</h1>

        <form class="form-inline" method="GET" action="/home">
            <input type="text" class="form-control" placeholder="Search..." name="search">
                <button class="btn btn-secondary" type="submit">Go!</button>
        </form>
            <div style="display:flex; flex-wrap:wrap">
            @foreach($figures as $figure)
            <div class="card" style="width: 240px;">
                <img src="{{asset('storage/'.$figure->photo_profile)}}" class="card-img-top" style="height: 10rem" alt="...">
                <div class="card-body">
                    <a href="/show-figure/{{$figure->id}}}">
                        <h5 class="card-title">
                            {{$figure->name}}
                        </h5>
                    </a>
                    <h6 class="card-subtitle mb-2 text-muted">Rp.{{$figure->price}}</h6>
                    <p class="card-text">{{$figure->description}}</p>
                    <h6 class="card-subtitle mb-2 text-muted">Qty:{{$figure->stock}}</h6>
                    <p class="card-text"><small class="text-muted">{{$figure->category->name}}</small></p>
                    @if(Auth::check())
                        @if(Auth::user()->isUser())
                            <a href="/create-cart/{{$figure->id}}/{{$figure->stock}}" class="btn btn-primary">Add to Cart</a>
                        @endif
                    @endif
                </div>
            </div>
            @endforeach
            </div>
        {{$figures->links()}}
        </div>
    </div>
</div>
@endsection

