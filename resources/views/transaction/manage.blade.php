@extends('layouts.nav')

@section('content')
@php
    $total = 0;
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>View Transaction</h1>
        @foreach($transactionheaders as $transactionheader)
            <b>Transaction Time:</b> {{$transactionheader->created_at}}<br>
            <b>Buyer Name:</b> {{$transactionheader->user->name}}<br>
            <b>Transaction Number&nbsp;:</b> {{$transactionheader->id}}<br>
        <table class="table table-striped">
            <tr>
                <th>Figure Picture</th>
                <th>Figure Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            @foreach($transactionheader->TransactionDetail as $transactiondetail)
            <tr>
                <td>
                    @if($transactiondetail->figure->photo_profile!=NULL)
                    <img src ="{{asset('storage/'.$transactiondetail->figure->photo_profile)}}" style="height:100px;width:100px">
                    @endif
                </td>
                <td>{{$transactiondetail->figure->name}}</td>
                <td>{{$transactiondetail->quantity}}</td>
                <td>Rp.{{$transactiondetail->figure->price}}</td>
            </tr>
            @php
                $total += ($transactiondetail->figure->price*$transactiondetail->quantity);
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

        @endforeach
        {{$transactionheaders->links()}}
        </div>
    </div>
</div>
@endsection
