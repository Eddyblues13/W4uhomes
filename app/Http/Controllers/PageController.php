<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type', 'sale');

        $properties = Property::where('type', $type)
            ->latest()
            ->paginate(12);

        return view('properties.index', compact('properties', 'type'));
    }

    public function show(Property $property)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please sign in to view property details.');
        }

        $relatedProperties = Property::where('type', $property->type)
            ->where('id', '!=', $property->id)
            ->limit(4)
            ->get();

        return view('properties.show', compact('property', 'relatedProperties'));
    }

    public function buy()
    {
        $properties = Property::where('type', 'sale')
            ->latest()
            ->limit(6)
            ->get();

        return view('properties.buy', compact('properties'));
    }

    public function rent()
    {
        $properties = Property::where('type', 'rent')
            ->latest()
            ->limit(6)
            ->get();

        return view('properties.rent', compact('properties'));
    }

    public function sold()
    {
        $properties = Property::where('type', 'sold')
            ->latest()
            ->limit(6)
            ->get();

        return view('properties.sold', compact('properties'));
    }
}
