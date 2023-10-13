<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::latest()->filter(request(['tag', 'search']))->get();
        return view('listings.index', compact('listings'));
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'company' => 'required|unique:listings',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email|unique:listings',
            'tags' => 'required',
            'description' => 'required',
        ]);

        Listing::create($data);

        return redirect('/')->with('message', 'Listing Created!');
    }
}
