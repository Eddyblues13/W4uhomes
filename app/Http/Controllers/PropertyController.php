<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function buy()
    {
        $properties = Property::where('type', 'buy')
            ->paginate(12);

        return view('properties.buy', compact('properties'));
    }

    public function sold()
    {
        $properties = Property::where('type', 'sale')
            ->paginate(12);

        return view('properties.rent', compact('properties'));
    }


    public function rent()
    {
        $properties = Property::where('type', 'rent')
            ->paginate(12);

        return view('properties.rent', compact('properties'));
    }

    public function sell()
    {
        return view('properties.sell');
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);
        $similarProperties = Property::where('id', '!=', $property->id)
            ->limit(3)
            ->get();
        $relatedProperties = Property::where('id', '!=', $property->id)
            ->limit(3)
            ->get();

        return view('properties.show', compact('property', 'similarProperties', 'relatedProperties'));
    }

    public function search(Request $request)
    {
        $query = Property::where('is_active', true);

        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('address', 'like', '%' . $request->search . '%')
                    ->orWhere('city', 'like', '%' . $request->search . '%')
                    ->orWhere('state', 'like', '%' . $request->search . '%')
                    ->orWhere('zip_code', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        if ($request->has('min_price') && $request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price') && $request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->has('bedrooms') && $request->bedrooms) {
            $query->where('bedrooms', '>=', $request->bedrooms);
        }

        if ($request->has('bathrooms') && $request->bathrooms) {
            $query->where('bathrooms', '>=', $request->bathrooms);
        }

        $properties = $query->paginate(12);

        return view('properties.search', compact('properties'));
    }
}
