<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Http\Requests\StoreItemsRequest;
use App\Http\Requests\UpdateItemsRequest;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Items::all();

        return view('inventory', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        return view('items.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $items = request()->validate([
            'name' => ['required', 'string'],
            'amount' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
            'status' => ['required', 'string'],
        ]);

        Items::create($items);

        return redirect('/items');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $items = Items::all();
        
        return  view('inventory', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Items::findOrFail($id);

        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $items = request()->validate([
            'name' => ['required', 'string'],
            'amount' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
            'status' => ['required', 'string'],
        ]);

        $item = Items::findOrFail($id);

        $item->update($items);

        return redirect('/items');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Items::findOrFail($id);

        $item->delete();

        return redirect('/items');
    }
}
