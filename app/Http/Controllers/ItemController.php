<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::listOfOptions();

        return view('items.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
        ]);
        $category = Category::find($request->input('category_id'));

        $category->items()->create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('items.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories = Category::listOfOptions();

        return view('items.edit', compact('item', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|max:30',
        ]);

        $item->name = $request->input('name');

        $category = Category::find($request->input('category_id'));

        $category->items()->save($item);

        return redirect()->route('items.index');


        return redirect()->route('items.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index');
    }

    public function search(Request $request)
    {
        dd($request->all());
        return redirect()->route('items.index');
    }

}
