<?php

namespace App\Http\Controllers;

use App\TransactionHeader;
use App\TransactionDetail;
use Illuminate\Http\Request;
use App\Cart;
use App\Figure;
use Illuminate\Support\Facades\Auth;

class TransactionHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $transactionheaders = TransactionHeader::with('TransactionDetail')->where('user_id',$user_id)->paginate(1);
        // dd($transactionheaders);
        return view('transaction.manage',compact('transactionheaders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $transactionheader = new TransactionHeader();
        $transactionheader->user_id = Auth::id();
        $transactionheader->save();

        $carts = Cart::where('user_id',$id)->get();


        foreach($carts as $cart){
            $transactiondetail = new TransactionDetail();
            $transactiondetail->transaction_id = $transactionheader->id;

            $transactiondetail->figure_id = $cart->figure_id;
            $transactiondetail->quantity = $cart->quantity;

            // $figure = Figure::findOrFail($transactiondetail->figure_id);

            // if($figure->stock == $transactiondetail->quantity){
            //     $figure->delete();
            // }else{
            //     $figure->stock -= $transactiondetail->quantity;
            //     $figure->save();
            // }

            $transactiondetail->save();
            $cart->delete();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransactionHeader  $transactionHeader
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionHeader $transactionHeader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransactionHeader  $transactionHeader
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionHeader $transactionHeader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransactionHeader  $transactionHeader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionHeader $transactionHeader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransactionHeader  $transactionHeader
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionHeader $transactionHeader)
    {
        //
    }
}
