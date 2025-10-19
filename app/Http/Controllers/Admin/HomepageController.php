<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomepageController extends Controller
{
    public function edit()
    {
        // You can store homepage content in config, database, or environment variables
        // For now, we'll use a simple array. In production, you might want to use a database table.
        $homepageData = [
            'hero_title' => config('homepage.hero_title', 'Rentals. Homes. Agents. Loans.'),
            'hero_subtitle' => config('homepage.hero_subtitle', 'Find your perfect home with our extensive property listings and expert agents.'),
            'about_title' => config('homepage.about_title', 'About Our Real Estate Platform'),
            'about_content' => config('homepage.about_content', 'We are committed to making home buying, selling, and renting easier and more transparent. With thousands of properties and experienced agents, we help you find your perfect home.'),
            'company_contact' => [
                'whatsapp' => config('homepage.whatsapp', '+1 (270) 931-8101'),
                'email' => config('homepage.company_email', 'w4uhomes@gmail.com'),
            ]
        ];

        return view('admin.homepage.edit', compact('homepageData'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'nullable|string|max:500',
            'about_title' => 'required|string|max:255',
            'about_content' => 'required|string|min:10',
            'whatsapp' => 'required|string|max:20',
            'company_email' => 'required|email',
        ]);

        try {
            // In a real application, you would save these to a database or config file
            // For this example, we'll simulate saving by storing in session or a simple file

            // You could create a settings table or use Laravel's config system
            // For now, we'll just return success and you can implement the storage method you prefer

            // Example: Save to a JSON file (simple approach for demo)
            $homepageSettings = [
                'hero_title' => $validated['hero_title'],
                'hero_subtitle' => $validated['hero_subtitle'],
                'about_title' => $validated['about_title'],
                'about_content' => $validated['about_content'],
                'whatsapp' => $validated['whatsapp'],
                'company_email' => $validated['company_email'],
            ];

            // Store in a JSON file (optional - you can remove this if using database)
            Storage::disk('local')->put('homepage_settings.json', json_encode($homepageSettings));

            return redirect()->route('admin.homepage.edit')->with('success', 'Homepage content updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.homepage.edit')->with('error', 'Error updating homepage content: ' . $e->getMessage());
        }
    }

    // Helper method to get homepage settings (you can use this in your main HomeController)
    public static function getHomepageSettings()
    {
        try {
            if (Storage::disk('local')->exists('homepage_settings.json')) {
                return json_decode(Storage::disk('local')->get('homepage_settings.json'), true);
            }
        } catch (\Exception $e) {
            // Fallback to default values
        }

        return [
            'hero_title' => 'Rentals. Homes. Agents. Loans.',
            'hero_subtitle' => 'Find your perfect home with our extensive property listings and expert agents.',
            'about_title' => 'About Our Real Estate Platform',
            'about_content' => 'We are committed to making home buying, selling, and renting easier and more transparent.',
            'whatsapp' => '+1 (270) 931-8101',
            'company_email' => 'w4uhomes@gmail.com',
        ];
    }
}
