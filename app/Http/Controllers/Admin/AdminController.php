<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Property;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'totalUsers' => User::count(),
            'totalProperties' => Property::count(),
            'featuredProperties' => Property::where('featured', true)->count(),
            'totalTestimonials' => Testimonial::count(),
            'newUsers' => User::where('created_at', '>=', now()->subDays(7))->count(),
        ];

        $recentUsers = User::latest()->take(5)->get();
        $recentProperties = Property::latest()->take(5)->get();

        return view('admin.home', compact('stats', 'recentUsers', 'recentProperties'));
    }
}