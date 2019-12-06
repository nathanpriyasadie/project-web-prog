<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Figure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id',$user_id)->get();
        if(count($carts)>0){
            $isCartExist = 1;
        }
        else $isCartExist=0;
        return view('cart.manage',compact('carts','isCartExist'));
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
    public function store($id,$qty)
    {
        $cart= Cart::where('figure_id',$id)->first();
        if($cart){
            if($cart->quantity<$qty){
                $cart->quantity+=1;
            }
        }else{
            $cart = new Cart();
            $cart->figure_id = $id;
            $cart->quantity = 1;
            $cart->user_id = Auth::id();
        }
        $cart->save();
        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect('/manage-cart');
    }
}
