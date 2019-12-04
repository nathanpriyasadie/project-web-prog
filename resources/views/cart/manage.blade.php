<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Manage Cart</h1>
        <table>
            <tr>
                <th>Figure Picture</th>
                <th>Figure Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Delete</th>
            </tr>
            @if($a==1)
            @foreach($carts as $cart)
            <tr>
                <td>
                    @if($cart->figure->photo_profile!=NULL)
                    <img src ="{{asset('storage/'.$cart->figure->photo_profile)}}" style="height:100px;width:100px">
                    @endif
                </td>
                <td>{{$cart->figure->name}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->figure->price}}</td>
                <td>
                    <form method="GET" action='/delete-cart/{{$cart->id}}'>
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <form method="GET" action='/create-transaction/{{$cart->user->id}}'>
            <input type="submit" value="Checkout" />
        </form>
            @endif
    </body>
</html>
