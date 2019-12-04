<?php

namespace App\Http\Controllers;

use App\Figure;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class FigureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchResult = request()->search;
        $figures = Figure::where('name','LIKE', "%$searchResult%")->paginate(6);
        return view('figure.manage',compact('figures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('figure.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name'  => 'min:5',
            'category_id' => 'filled',
            'price' => 'filled|min:100000|numeric',
            'description' => 'min:10',
            'stock'  => 'filled|min:1',
            'photo_profile' => 'mimes:jpeg,png,jpg'
        ],[
            'name.min' => 'name min 5 characters',
            'category_id.filled' => 'category need to be filled',
            'price.filled' => 'price need to be filled',
            'price.min' => 'price min 100000',
            'price.numeric' => 'invalid price format',
            'description.min' => 'description min 10 characters',
            'stock.filled' => 'stock need to be filled',
            'stock.min' => 'stock min 1',
            'photo_profile.mimes' => 'invalid photo format'
        ]);
        $validator->validate();

        $file = $request->file('photo_profile');
        $filename = 'figure-'.$request->name.'.'.$file->getClientOriginalExtension();
        $path=$file->storeAs('public',$filename);

        $figure = new Figure();
        $figure->name = $request['name'];
        $figure->category_id = $request['category_id'];
        $figure->price = $request['price'];
        $figure->description = $request['description'];
        $figure->stock = $request['stock'];
        $figure->photo_profile = $filename;

        $figure->save();
        return redirect('/create-figure');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Figure  $figure
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $figure = Figure::findOrFail($id);
        return view('figure.show',compact('figure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Figure  $figure
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $figure = Figure::findOrFail($id);
        $categories = Category::all();
        return view('figure.update',compact('figure','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Figure  $figure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'name'  => 'min:5',
            'category_id' => 'filled',
            'price' => 'filled|min:100000|numeric',
            'description' => 'min:10',
            'stock'  => 'filled|min:1',
            'photo_profile' => 'mimes:jpeg,png,jpg'
        ],[
            'name.min' => 'name min 5 characters',
            'category_id.filled' => 'category need to be filled',
            'price.filled' => 'price need to be filled',
            'price.min' => 'price min 100000',
            'price.numeric' => 'invalid price format',
            'description.min' => 'description min 10 characters',
            'stock.filled' => 'stock need to be filled',
            'stock.min' => 'stock min 1',
            'photo_profile.mimes' => 'invalid photo format'
        ]);
        $validator->validate();

        $file = $request->file('photo_profile');
        $filename = 'figure-'.$request->name.'.'.$file->getClientOriginalExtension();
        $path=$file->storeAs('public',$filename);

        $figure = Figure::find($id);
        $oldpath = 'public/'.$figure['photo_profile'];
        Storage::delete($oldpath);

        $figure->name = $request['name'];
        $figure->category_id = $request['category_id'];
        $figure->price = $request['price'];
        $figure->description = $request['description'];
        $figure->stock = $request['stock'];
        $figure->photo_profile = $filename;

        $figure->save();
        return redirect('manage-figure');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Figure  $figure
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $figure = Figure::findOrFail($id);
        $figure->delete();

        return redirect('/manage-figure');
    }
}
