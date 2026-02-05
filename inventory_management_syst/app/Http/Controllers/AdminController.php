<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\admin;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('testAdmin');
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
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|string|max:255',
        //     'email'=> 'required|string',
        //     'staff_id'=> 'required|string|max:255',
        //     'password'=> 'required|string|min:8|confirmed',
        // ]);

        // $admin = New admin;
        // $admin->name = $request->name;
        // $admin->email = $request->email;
        // $admin->staff_id = $request->staff_id;
        // $admin->password = bcrypt($request->password);
        // $admin->save();

        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'staff_id' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        admin::create([
            'name' => request('name'),
            'email' => request('email'),
            'staff_id' => request('staff_id'),
            'password' => request('password')
        ]);

        return redirect('/admin/show');
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        $admin = admin::all();

        return view('admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $admin = admin::find($id);

        return view('admins.edit', ['admin' => $admin ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        request()->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|string',
            'password'=> 'string|min:8',
        ]);

        $admin = admin::findOrFail($id);

        // $admin->name = request('name');
        // $admin->email = request('email');
        // $admin->password = request('password');
        // $admin->save();
        
        $admin->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password')
        ]);

        return redirect('/admin/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $admin = admin::findOrFail($id);

        $admin->delete();

        return redirect('/admin/show');
    }
}
