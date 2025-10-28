<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::latest()->paginate(10);
        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('admin.properties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:buy,rent,sale',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'required|string',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'square_feet' => 'required|integer|min:0',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'featured' => 'boolean',
        ]);

        $data = $request->except(['images', 'main_image']);
        $data['featured'] = $request->has('featured');

        // Handle main image upload to public folder
        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_main_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('images/properties'), $mainImageName);
            $data['main_image'] = 'images/properties/' . $mainImageName;
        }

        // Handle carousel images upload to public folder
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/properties'), $imageName);
                $imagePaths[] = 'images/properties/' . $imageName;
            }
            $data['images'] = $imagePaths;
        }

        Property::create($data);

        return redirect()->route('admin.properties.index')->with('success', 'Property created successfully.');
    }

    public function edit(Property $property)
    {
        return view('admin.properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:buy,rent,sale',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'required|string',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'square_feet' => 'required|integer|min:0',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'featured' => 'boolean',
        ]);

        $data = $request->except(['images', 'main_image', 'remove_main_image', 'remove_images']);
        $data['featured'] = $request->has('featured');

        // Handle main image
        if ($request->has('remove_main_image')) {
            // Remove main image from public folder
            if ($property->main_image && file_exists(public_path($property->main_image))) {
                unlink(public_path($property->main_image));
            }
            $data['main_image'] = null;
        } elseif ($request->hasFile('main_image')) {
            // Update main image
            if ($property->main_image && file_exists(public_path($property->main_image))) {
                unlink(public_path($property->main_image));
            }

            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_main_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('images/properties'), $mainImageName);
            $data['main_image'] = 'images/properties/' . $mainImageName;
        }

        // Handle carousel images
        $currentImages = $property->images ?? [];

        // Remove selected images
        if ($request->has('remove_images')) {
            foreach ($request->remove_images as $index) {
                if (isset($currentImages[$index])) {
                    if (file_exists(public_path($currentImages[$index]))) {
                        unlink(public_path($currentImages[$index]));
                    }
                    unset($currentImages[$index]);
                }
            }
            $currentImages = array_values($currentImages); // Reindex array
        }

        // Remove selected images
        // if ($request->has('remove_images')) {
        //     foreach ($request->remove_images as $index) {
        //         if (isset($currentImages[$index])) {
        //             if (file_exists(public_path($currentImages[$index]))) {
        //                 unlink(public_path($currentImages[$index]));
        //             }
        //             unset($currentImages[$index]);
        //         }
        //     }
        //     $currentImages = array_values($currentImages); // Reindex array
        // }

        // Add new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/properties'), $imageName);
                $currentImages[] = 'images/properties/' . $imageName;
            }
        }

        $data['images'] = $currentImages;

        $property->update($data);

        return redirect()->route('admin.properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        // Delete main image from public folder
        if ($property->main_image && file_exists(public_path($property->main_image))) {
            unlink(public_path($property->main_image));
        }

        // Delete carousel images from public folder
        if ($property->images) {
            foreach ($property->images as $image) {
                if (file_exists(public_path($image))) {
                    unlink(public_path($image));
                }
            }
        }

        $property->delete();

        return redirect()->route('admin.properties.index')->with('success', 'Property deleted successfully.');
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(Property $property)
    {
        $property->update([
            'featured' => !$property->featured
        ]);

        $status = $property->featured ? 'featured' : 'unfeatured';
        return redirect()->back()->with('success', "Property {$status} successfully.");
    }
}
