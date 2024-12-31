<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(session("user_id") != null)
        {   
            $address=Address::with('client')->where("client_id",session("user_id"))
                    ->whereNot('address_1',null)->get();
            $address_ad=Address::where("client_id",session("user_id"))->get();
            //return $address_ad;
            //return $address;
            $addressCount = $address_ad->count();

        return view('add_address', compact("address", "address_ad", "addressCount"));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("address_form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits_between:10,15',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'pincode' => 'required|digits_between:5,10',
        ]);
        
        $address = Address::create([
            'name'=> $request->name,
            'client_id'=>session('user_id'),
            'phone'=> $request->phone,
            'address_2'=> $request->address,
            'city'=> $request->city,
            'state'=> $request->state,
            'country'=> $request->country,
            'pincode'=> $request->pincode,
        ]);
        return redirect()->route('address.index')->with('success','Address Added Successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $address = Address::find($id);

        if (!$address) {
            return redirect()->back()->with('error', 'Address not found.');
        }

        if ($address->delete()) {
            return redirect()->back()->with('success', 'Address deleted successfully.');
        }

        return redirect()->back()->with('error', 'Failed to delete the address.');
    }
}
