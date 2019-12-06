@extends('layouts.nav')

@section('content')
@php
    $total = 0;
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Manage Cart</h1>
        <table class="table table-striped">
            <tr>
                <th>Figure Picture</th>
                <th>Figure Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Delete</th>
            </tr>
            @if($isCartExist==1)
            @foreach($carts as $cart)
            <tr>
                <td>
                    @if($cart->figure->photo_profile!=NULL)
                    <img src ="{{asset('storage/'.$cart->figure->photo_profile)}}" style="height:100px;width:100px">
                    @endif
                </td>
                <td>{{$cart->figure->name}}</td>
                <td>{{$cart->quantity}}</td>
                <td>Rp.{{$cart->figure->price}}</td>
                <td>
                    <form method="GET" action='/delete-cart/{{$cart->id}}'>
                        <input type="submit" value="Delete" class="btn btn-danger"  />
                    </form>
                </td>
            </tr>
            @php
                $total += ($cart->figure->price*$cart->quantity);
            @endphp
            @endforeach
            <tr>
                <td colspan="3">
                    Total
                </td>
                <td>
                    Rp.{{$total}}
                </td>
            </tr>
        </table>
        <form method="GET" action='/create-transaction/{{$cart->user->id}}'>
            <input type="submit" value="Checkout" class="btn btn-primary"  />
        </form>
            @else
                <tr>
                    <td colspan="5">
                        No Item
                    </td>
                </tr>
            @endif

            </div>
    </div>
</div>
@endsection
