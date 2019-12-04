<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Figure;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $searchResult = request()->search;
        $figures = Figure::where('name','LIKE', "%$searchResult%")->paginate(6);
        return view('home.manage',compact('figures'));
    }
}
