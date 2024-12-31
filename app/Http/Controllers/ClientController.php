<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Address;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=Address::with('client')
                ->where("client_id", session("user_id"))
                ->whereNot("address_1", null)
                ->first();
        //return $user;
        return view("profile",compact("user"));
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
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required|string|min:6',
            'gender' => 'required|in:Male,Female,Other',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'pincode' => 'required|string|size:6',
            'phone' => 'required|string|size:10',
        ]);
    
        // Insert the validated data
        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Make sure to hash the password
            'gender' => $request->gender,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'pincode' => $request->pincode,
            'phone' => $request->phone,
        ]);
        $address=Address::create([
            'client_id'=> $client->client_id,
            'address_1'=> $request->address,
        ]);
        // You can return a response or redirect as needed
        return response()->json(['success' => true, 'message' => 'Registration successful!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Client::find($id);
        $user->update([
            'name'=> $request->name,
            'gender'=> $request->gender,
            'city'=> $request->city,
            'state'=> $request->state,
            'country'=> $request->country,
            'pincode'=> $request->pincode,
            'phone'=> $request->phone
        ]);
        $user_add=Address::where('client_id', $id)
                ->whereNot('address_1',null)->first();
        $user_add->update([
            'address_1' => $request->address,
        ]);
        return redirect()->route('client.index')->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
    public function change_password(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            
            'current_password' => ['required', 'string', 'min:6'],
            'new_password' => ['required', 'string', 'min:6', 'different:current_password'],
            'confirm_password' => ['required', 'string', 'min:6','same:new_password'],
        ]);

        // Find the user by ID
        $client_id=session('user_id');
        $user = Client::find($client_id);

        // Compare plain-text passwords
        if ($request->current_password !== $user->password) {
            return view('layouts.client_dashboard')->with('error_pass','The current password is incorrect.');
        }
        if ($request->new_password !== $request->confirm_password) {
            return view('layouts.client_dashboard')->with('error_pass','The Confirm Password is not match with New Password.');
        }

        // Update the user's password
        $user->update([
            'password' => $request->new_password, // Store the new password directly
        ]);

        return back()->with('success_pass', 'Password changed successfully.');
    }

}
