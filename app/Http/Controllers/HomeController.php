<?php
// app/Http/Controllers/HomeController.php
namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProperties = Property::where('featured', true)
            ->limit(6)
            ->get();

        $testimonials = Testimonial::latest()->limit(10)->get();

        return view('home.homepage', compact('featuredProperties', 'testimonials'));
    }

    public function about()
    {
        return view('home.about');
    }

    public function faq()
    {
        $faqs = [
            [
                'question' => 'How do I buy a home?',
                'answer' => 'Our platform helps you find your dream home. You can browse listings, connect with agents, and get pre-approved for a mortgage.'
            ],
            [
                'question' => 'What is the buying process?',
                'answer' => 'The process includes: finding a home, making an offer, home inspection, securing financing, and closing.'
            ],
            // Add more FAQs
        ];

        return view('home.faq', compact('faqs'));
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Here you would typically send an email
        return redirect()->back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }


    public function form()
    {
        return view('home.form');
    }
}
