<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'transaction_type' => 'required|in:bought,rented,sold',
            'amount' => 'required|numeric|min:0',
            'testimonial' => 'required|string|min:10',
        ]);

        Testimonial::create($request->all());

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'transaction_type' => 'required|in:bought,rented,sold',
            'amount' => 'required|numeric|min:0',
            'testimonial' => 'required|string|min:10',
        ]);

        $testimonial->update($request->all());

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        try {
            $testimonialName = $testimonial->name;
            $testimonial->delete();

            return redirect()->route('admin.testimonials.index')->with('success', "Testimonial from '{$testimonialName}' deleted successfully.");
        } catch (\Exception $e) {
            return redirect()->route('admin.testimonials.index')->with('error', 'Error deleting testimonial: ' . $e->getMessage());
        }
    }
}
