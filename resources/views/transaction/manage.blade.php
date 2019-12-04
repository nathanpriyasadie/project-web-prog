<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>View Transaction</h1>
        @foreach($transactionheaders as $transactionheader)
            {{$transactionheader->created_at}}
            {{$transactionheader->user->name}}
            {{$transactionheader->id}}
        <table>
            <tr>
                <th>Figure Picture</th>
                <th>Figure Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>total</th>
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
                <td>{{$transactiondetail->figure->price}}</td>
            </tr>
            @endforeach
        </table>
        @endforeach
        {{$transactionheaders->links()}}
    </body>
</html>
