<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use Illuminate\Support\Facades\Storage;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, let's create some sample images in storage
        $this->createSampleImages();

        // Sample data arrays
        $cities = [
            'New York',
            'Los Angeles',
            'Chicago',
            'Houston',
            'Phoenix',
            'Philadelphia',
            'San Antonio',
            'San Diego',
            'Dallas',
            'San Jose',
            'Austin',
            'Jacksonville',
            'Fort Worth',
            'Columbus',
            'Charlotte',
            'San Francisco',
            'Indianapolis',
            'Seattle',
            'Denver',
            'Washington'
        ];

        $states = [
            'NY',
            'CA',
            'IL',
            'TX',
            'AZ',
            'PA',
            'TX',
            'CA',
            'TX',
            'CA',
            'TX',
            'FL',
            'TX',
            'OH',
            'NC',
            'CA',
            'IN',
            'WA',
            'CO',
            'DC'
        ];

        $propertyTypes = ['buy', 'rent', 'sale'];

        $descriptions = [
            'Beautiful modern home with spacious rooms and updated kitchen. Perfect for families looking for comfort and style in a great neighborhood.',
            'Stunning property featuring hardwood floors, granite countertops, and a spacious backyard. Recently renovated with high-end finishes throughout.',
            'Charming home with character and modern amenities. Features include updated bathrooms, energy-efficient windows, and a cozy fireplace.',
            'Luxury living at its finest. This property boasts high ceilings, premium appliances, and breathtaking views. Perfect for entertaining.',
            'Spacious family home in a quiet neighborhood. Features large bedrooms, updated kitchen, and a beautiful garden perfect for outdoor living.',
            'Modern condo with open floor plan and city views. Includes premium finishes, smart home features, and access to building amenities.',
            'Cozy bungalow with original charm and modern updates. Features a beautiful front porch, updated kitchen, and spacious backyard.',
            'Elegant townhouse in prime location. Features include private garage, rooftop terrace, and high-end finishes throughout.',
            'Contemporary home with sleek design and smart technology. Energy-efficient features and low-maintenance landscaping.',
            'Traditional home with modern luxury. Features gourmet kitchen, master suite with spa bathroom, and outdoor living space.'
        ];

        $addresses = [
            '123 Main Street',
            '456 Oak Avenue',
            '789 Pine Road',
            '321 Elm Drive',
            '654 Maple Lane',
            '987 Cedar Court',
            '159 Birch Street',
            '753 Willow Way',
            '246 Spruce Circle',
            '864 Magnolia Drive',
            '951 Cherry Lane',
            '357 Aspen Road',
            '684 Poplar Street',
            '792 Redwood Avenue',
            '183 Palm Court',
            '276 Cypress Lane',
            '369 Sequoia Drive',
            '483 Laurel Road',
            '594 Sycamore Street',
            '726 Chestnut Avenue'
        ];

        $titles = [
            'Modern Family Home in {city}',
            'Luxury {type} Property in {city}',
            'Beautiful {bedrooms} Bedroom Home',
            'Spacious {type} Opportunity in {city}',
            'Stunning {bedrooms}BD/{bathrooms}BA Property',
            'Elegant Home in Prime {city} Location',
            'Charming {type} Property with Modern Amenities',
            'Contemporary Living in {city}',
            'Perfect Family Home in {city}',
            'Luxury {type} with Amazing Features'
        ];

        // Local image paths (these should exist in storage/app/public/properties)
        $localImages = [
            'properties/house1.avif',
            'properties/house2.avif',
            'properties/house3.avif',
            'properties/house4.avif',
            'properties/house5.avif',
            'properties/apartment1.avif',
            'properties/apartment2.avif',
            'properties/apartment3.avif',
            'properties/townhouse1.avif',
            'properties/townhouse2.avif',
        ];

        $propertyData = [];

        for ($i = 1; $i <= 100; $i++) {
            $cityIndex = array_rand($cities);
            $city = $cities[$cityIndex];
            $state = $states[$cityIndex];
            $type = $propertyTypes[array_rand($propertyTypes)];

            // Generate realistic data based on property type
            if ($type === 'buy') {
                $price = rand(250000, 1500000);
                $bedrooms = rand(2, 6);
                $bathrooms = rand(2, 4);
                $squareFeet = rand(1200, 4000);
            } elseif ($type === 'rent') {
                $price = rand(1500, 8000);
                $bedrooms = rand(1, 4);
                $bathrooms = rand(1, 3);
                $squareFeet = rand(800, 2500);
            } else { // sale (sold properties)
                $price = rand(200000, 1200000);
                $bedrooms = rand(2, 5);
                $bathrooms = rand(2, 4);
                $squareFeet = rand(1000, 3500);
            }

            // Generate title
            $titleTemplate = $titles[array_rand($titles)];
            $title = str_replace(
                ['{city}', '{type}', '{bedrooms}', '{bathrooms}'],
                [$city, $type, $bedrooms, $bathrooms],
                $titleTemplate
            );

            // Select random main image
            $mainImage = $localImages[array_rand($localImages)];

            // Select 2-4 random images for carousel (excluding main image)
            $carouselImages = array_diff($localImages, [$mainImage]);
            shuffle($carouselImages);
            $selectedCarouselImages = array_slice($carouselImages, 0, rand(2, 4));

            // Create property data
            $propertyData[] = [
                'title' => $title . " #$i",
                'description' => $descriptions[array_rand($descriptions)],
                'price' => $price,
                'type' => $type,
                'address' => $addresses[array_rand($addresses)],
                'city' => $city,
                'state' => $state,
                'zip_code' => $this->generateZipCode(),
                'bedrooms' => $bedrooms,
                'bathrooms' => $bathrooms,
                'square_feet' => $squareFeet,
                'main_image' => $mainImage,
                'images' => json_encode($selectedCarouselImages),
                'featured' => rand(0, 1),
                'created_at' => now()->subDays(rand(1, 365)),
                'updated_at' => now()->subDays(rand(1, 365)),
            ];
        }

        // Insert properties in batches
        foreach (array_chunk($propertyData, 25) as $chunk) {
            Property::insert($chunk);
        }

        $this->command->info('100 properties seeded successfully with local images!');
    }

    /**
     * Generate a random US zip code
     */
    private function generateZipCode(): string
    {
        return sprintf('%05d', rand(10000, 99999));
    }

    /**
     * Create sample images directory and placeholder images
     */
    private function createSampleImages(): void
    {
        $propertiesDir = 'public/properties';

        // Create directory if it doesn't exist
        if (!Storage::exists($propertiesDir)) {
            Storage::makeDirectory($propertiesDir);
        }

        // Create some placeholder images (you should replace these with actual images)
        $sampleImages = [
            'house1.jpg',
            'house2.jpg',
            'house3.jpg',
            'house4.jpg',
            'house5.jpg',
            'apartment1.jpg',
            'apartment2.jpg',
            'apartment3.jpg',
            'townhouse1.jpg',
            'townhouse2.jpg'
        ];

        foreach ($sampleImages as $image) {
            $filePath = $propertiesDir . '/' . $image;
            if (!Storage::exists($filePath)) {
                // Create a simple text file as placeholder (replace with actual images)
                Storage::put($filePath, "Placeholder for $image - Upload actual image file");
                $this->command->info("Created placeholder: $filePath");
            }
        }

        $this->command->info('Sample image directory created. Please upload actual images to storage/app/public/properties/');
    }
}
