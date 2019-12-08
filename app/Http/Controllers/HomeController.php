<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Figure;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $searchResult = request()->search;
        // $figures = Figure::where('name','LIKE', "%$searchResult%")
        //     ->where('stock','>',0)->paginate(6);

        // $figures = DB::table('figures')
        //         ->join('categories', 'figures.category_id', '=', 'categories.id')
        //         //->whereNotIn('stock',[0])
        //         ->where('figures.name','LIKE', "%".$searchResult."%")
        //         ->orWhere('categories.name','LIKE', "%".$searchResult."%")
        //         ->select('figures.name as figure_name','categories.name as category_name','price','description','stock','photo_profile','figures.id as figure_id')
        //         ->paginate(6);

        // $figures = Figure::whereIn('figures.id',function($query){
        //     $query->where('stock','>', 0)
        //     ->select('figures.id');
        // })
        // ->join('categories', 'figures.category_id', '=', 'categories.id')
        // ->where('figures.name','LIKE', "%".$searchResult."%")
        // ->orWhere('categories.name','LIKE', "%".$searchResult."%")
        // // ->where('figures.stock','>',0)
        // ->select('figures.name as figure_name','categories.name as category_name','price','description','stock','photo_profile','figures.id as figure_id')
        // ->paginate(6);

        $figures = DB::table('figures')
            ->join('categories', 'figures.category_id', '=', 'categories.id')
            ->whereNotIn('figures.stock',[0])
            ->where('figures.name','LIKE', "%$searchResult%")
            // ->orWhere('categories.name','LIKE', "%$searchResult%")
            ->select('figures.name as figure_name','categories.name as category_name','price','description','stock','photo_profile','figures.id as figure_id')
            ->paginate(6);

        $filtered = collect([]);

        // dd($figures);
        return view('home.manage',compact('figures'));
    }
}
