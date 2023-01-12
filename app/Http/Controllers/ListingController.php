<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'edit', 'udpate', 'destroy']);
        
    }
    
    public function index()
    {
        return inertia('Listing/Index', [
            'listings' => Listing::all()
       
        ]     
        );
     
    }

   
    public function create()
    {
        return inertia('Listing/Create');
    }
    
    public function store(Request $request)
    {
        $request->user()->listings()->create(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:2400',
                'city' =>  'required',
                'code' => 'required',
                'street' => 'required|min:1|max:1000',
                'street_nr' => 'required|integer|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',

        ]) 
    );
    // dd($request->all());

        return redirect()->route('listing.index')->with('success', 'Listing created successfully');

    }

    
    public function show(Listing $listing)
    {
        return inertia('Listing/Show', [
            'listing' => $listing
        ]
        );
        
    }

    
    public function edit(Listing $listing)
    {
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
            );
    }

    
    public function update(Request $request, Listing $listing)
    {
        $listing->update(
                               
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:2400',
                'city' =>  'required',
                'code' => 'required',
                'street' => 'required|min:1|max:1000',
                'street_nr' => 'required|integer|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',

        ]) 
    );
    

        return redirect()->route('listing.index')->with('success', 'Listing updated successfully');

    }

    public function destroy(Listing $listing)
    {
        $listing->delete();

        // return redirect()->back()->with('success', 'Listing deleted');

        return redirect()->intended('/listing');
    }
}
