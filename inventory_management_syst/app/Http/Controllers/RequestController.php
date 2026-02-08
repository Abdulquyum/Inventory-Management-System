<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\Items;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use App\Rules\CheckItemStock;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Items::all();
        return view('request_item', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $request_info = request()->validate([
            'requester_name' => ['required', 'string'],
            'user_id' => ['integer'],
            'department' => ['required', 'string'],
            'item' => ['required', 'string', Rule::exists('items', 'name'), new CheckItemStock],
            'quantity' => ['required', 'integer'],
            'purpose' => ['required', 'string'],
        ]);

        $item_id = Items::where('name', $request_info['item'])->value('id');

        Request::create([
            'requester_name' => $request_info['requester_name'],
            'user_id' => Auth::id(),
            'department' => $request_info['department'],
            'item' => $request_info['item'],
            'item_id' => $item_id,
            'quantity' => $request_info['quantity'],
            'purpose' => $request_info['purpose'],
        ]);

        return redirect()->back()->with('success', 'Request submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $requested_info = Request::all();

        return view('Administrator.adminRequest', compact('requested_info'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $request = Request::findOrFail($id);
        return view('Administrator.editRequest', compact('request'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function approve($id)
    {
        $request = Request::findOrFail($id);
        // Add logic to approve the request here
        $request->status = 'approved';
        $request->save();

        $item = Items::findOrFail($request->item_id);
        if ($item->quantity >= $request->quantity) {
            $item->quantity -= $request->quantity;
            $item->save();
        } else {
            return redirect()->back()->withErrors(['stock' => 'Insufficient stock to approve this request.']);
        }
        
        return redirect()->route('requests.show')->with('success', 'Request approved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $request = Request::findOrFail($id);
        $request->delete();
        return redirect()->route('requests.show')->with('success', 'Request deleted successfully!');
    }
}
