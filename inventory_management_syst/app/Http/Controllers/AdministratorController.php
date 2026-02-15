<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Administrator;
use App\Http\Requests\StoreAdministratorRequest;
use App\Http\Requests\UpdateAdministratorRequest;


class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Administrator.registerAdmin');
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
    public function register()
    {
        $administrator = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:administrators', 'string', 'max:255'],
            'email.unique' => 'The email has already been taken.',
            'staff_id' => ['required', 'string'],
            'password' => ['required', 'string', 'min:4', 'confirmed']
        ]);

        // $administrator = Administrator::create([
        //     'name' => request('name'),
        //     'email' => request('email'),
        //     'staff_id' => request('staff_id'),
        //     'password' => request('password')
        // ]);

        // dd($administrator);

        $user = Administrator::create($administrator); 

        Auth::guard('admin')->login($user);

        return redirect('/adminDashboard');
    }

    public function dashboard()
    {
        // Get total items count
        $totalItems = \App\Models\Items::count();
        
        // Get pending requests count
        $pendingRequests = \App\Models\Request::where('status', 'pending')->count();
        
        // Get low stock alerts (quantity less than 5)
        $lowStockAlerts = \App\Models\Items::where('quantity', '<', 5)->count();
        
        // Determine stock status
        $stockStatus = $totalItems > 100 ? 'Healthy stock' : 'Monitor needed';
        
        // Get recent activities (last 5)
        $activities = [];
        
        return view('Administrator.adminDashboard', [
            'totalItems' => $totalItems,
            'pendingRequests' => $pendingRequests,
            'lowStockAlerts' => $lowStockAlerts,
            'stockStatus' => $stockStatus,
            'activities' => $activities
        ]);
    }

    public function profile()
    {
        $user = Administrator::find(Auth::guard('admin')->id());

        return view('Administrator.profile', [
            'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function users(Administrator $administrator)
    {
        $administrators = Administrator::all();
        
        $users = User::all();

        return view('Administrator.users', [
        'administrators' => $administrators,
        'users' => $users
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function reports()
     {
        return view('Administrator.reports');
     }


    /**
     * Display the specified resource.
     */
    public function show(Administrator $administrator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrator $administrator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdministratorRequest $request, Administrator $administrator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout(Administrator $administrator)
    {
        Auth::guard('admin')->logout();

        // request()->session()->invalidate();
        // request()->session()->regenerateToken();

        return redirect('/');
    }
}
