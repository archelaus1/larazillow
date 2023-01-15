<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }
    public function index(Request $request){
        // dd($request->all());

        $filters = [
            'deleted' =>$request->boolean('deleted'),
            ...$request->only(['by', 'order'])
        ];

        return inertia('Realtor/Index', 
        [
            'filters' => $filters,
            'listings' => Auth::user()
            ->listings()
            ->filter($filters)
            ->withCount('images')
            ->paginate(6)
            ->withQueryString()
        ]
        );
    }

    public function create()
    {

        // $this->authorize('create', Listing::class);

        return inertia('Realtor/Create');
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

        return redirect()->route('realtor.listing.index')->with('success', 'Listing created successfully');

    }

    public function edit(Listing $listing)
    {
        return inertia(
            'Realtor/Edit',
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
    

        return redirect()->route('realtor.listing.index')->with('success', 'Listing updated successfully');

    }

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        // return redirect()->back()->with('success', 'Listing deleted');

        return redirect()->intended('/realtor/listing')->with('success', "Listing deleted");
 
}

    public function restore(Listing $listing){
        $listing->restore();

        return redirect()->back()->with('success', "Listing was restored");
    }
}