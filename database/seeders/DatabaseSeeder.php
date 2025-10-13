<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Property;
use App\Models\Testimonial;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create sample users
        User::factory(10)->create();

        // Create sample properties
        $properties = [
            [
                'title' => 'Modern Downtown Apartment',
                'description' => 'Beautiful modern apartment in the heart of downtown with amazing city views.',
                'price' => 450000,
                'type' => 'sale',
                'address' => '123 Main St',
                'city' => 'New York',
                'state' => 'NY',
                'zip_code' => '10001',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'square_feet' => 1200,
                'images' => [
                    'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                    'https://images.unsplash.com/photo-1484154218962-a197022b5858?ixlib=rb-4.0.3&auto=format&fit=crop&w=2074&q=80'
                ],
                'featured' => true
            ],
            [
                'title' => 'Luxury Penthouse with Rooftop',
                'description' => 'Stunning penthouse with private rooftop terrace and panoramic city views.',
                'price' => 1250000,
                'type' => 'sale',
                'address' => '456 Park Ave',
                'city' => 'New York',
                'state' => 'NY',
                'zip_code' => '10022',
                'bedrooms' => 3,
                'bathrooms' => 3,
                'square_feet' => 2400,
                'images' => [
                    'https://images.unsplash.com/photo-1513584684374-8bab748fbf90?ixlib=rb-4.0.3&auto=format&fit=crop&w=2060&q=80'
                ],
                'featured' => true
            ],
            [
                'title' => 'Cozy Studio Apartment',
                'description' => 'Perfect studio apartment for young professionals in a great neighborhood.',
                'price' => 1800,
                'type' => 'rent',
                'address' => '789 Broadway',
                'city' => 'New York',
                'state' => 'NY',
                'zip_code' => '10003',
                'bedrooms' => 1,
                'bathrooms' => 1,
                'square_feet' => 600,
                'images' => [
                    'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'
                ],
                'featured' => false
            ],
            [
                'title' => 'Historic Brownstone',
                'description' => 'Beautifully restored historic brownstone with original details and modern amenities.',
                'price' => 850000,
                'type' => 'sold',
                'address' => '321 Brownstone Ln',
                'city' => 'Brooklyn',
                'state' => 'NY',
                'zip_code' => '11201',
                'bedrooms' => 4,
                'bathrooms' => 2,
                'square_feet' => 2200,
                'images' => [
                    'https://images.unsplash.com/photo-1518780664697-55e3ad937233?ixlib=rb-4.0.3&auto=format&fit=crop&w=2060&q=80'
                ],
                'featured' => false
            ],
            [
                'title' => 'Waterfront Condo',
                'description' => 'Luxurious waterfront condo with balcony and stunning harbor views.',
                'price' => 3200,
                'type' => 'rent',
                'address' => '555 Harbor Dr',
                'city' => 'Miami',
                'state' => 'FL',
                'zip_code' => '33131',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'square_feet' => 1500,
                'images' => [
                    'https://images.unsplash.com/photo-1540518614846-7eded1027f2b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2057&q=80'
                ],
                'featured' => true
            ],
            [
                'title' => 'Suburban Family Home',
                'description' => 'Spacious family home in quiet suburban neighborhood with great schools.',
                'price' => 575000,
                'type' => 'sale',
                'address' => '234 Maple St',
                'city' => 'Austin',
                'state' => 'TX',
                'zip_code' => '78704',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'square_feet' => 2800,
                'images' => [
                    'https://images.unsplash.com/photo-1518780664697-55e3ad937233?ixlib=rb-4.0.3&auto=format&fit=crop&w=2060&q=80'
                ],
                'featured' => false
            ],
            [
                'title' => 'Downtown Loft',
                'description' => 'Industrial-style loft with high ceilings and exposed brick walls.',
                'price' => 2200,
                'type' => 'rent',
                'address' => '667 Industrial Ave',
                'city' => 'Chicago',
                'state' => 'IL',
                'zip_code' => '60607',
                'bedrooms' => 1,
                'bathrooms' => 1,
                'square_feet' => 1100,
                'images' => [
                    'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'
                ],
                'featured' => false
            ],
            [
                'title' => 'Mountain Retreat',
                'description' => 'Secluded mountain cabin perfect for nature lovers and outdoor enthusiasts.',
                'price' => 420000,
                'type' => 'sold',
                'address' => '888 Mountain View Rd',
                'city' => 'Denver',
                'state' => 'CO',
                'zip_code' => '80202',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'square_feet' => 1800,
                'images' => [
                    'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'
                ],
                'featured' => true
            ],
            [
                'title' => 'Beachfront Villa',
                'description' => 'Luxurious beachfront villa with private pool and direct beach access.',
                'price' => 2850000,
                'type' => 'sale',
                'address' => '123 Ocean Dr',
                'city' => 'Malibu',
                'state' => 'CA',
                'zip_code' => '90265',
                'bedrooms' => 5,
                'bathrooms' => 4,
                'square_feet' => 4200,
                'images' => [
                    'https://images.unsplash.com/photo-1510798831971-661eb04b3739?ixlib=rb-4.0.3&auto=format&fit=crop&w=2060&q=80'
                ],
                'featured' => true
            ],
            [
                'title' => 'University Apartment',
                'description' => 'Modern apartment near university campus, perfect for students.',
                'price' => 950,
                'type' => 'rent',
                'address' => '456 College Ave',
                'city' => 'Boston',
                'state' => 'MA',
                'zip_code' => '02134',
                'bedrooms' => 2,
                'bathrooms' => 1,
                'square_feet' => 800,
                'images' => [
                    'https://images.unsplash.com/photo-1555854877-bab0e564b8d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=2060&q=80'
                ],
                'featured' => false
            ],
            // Continue with more properties to reach 100...
        ];

        // Generate remaining properties to reach 100
        $cities = ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix', 'Philadelphia', 'San Antonio', 'San Diego', 'Dallas', 'San Jose'];
        $states = ['NY', 'CA', 'IL', 'TX', 'AZ', 'PA', 'TX', 'CA', 'TX', 'CA'];
        $propertyTypes = ['sale', 'rent', 'sold'];

        for ($i = count($properties); $i < 100; $i++) {
            $cityIndex = array_rand($cities);
            $type = $propertyTypes[array_rand($propertyTypes)];

            // Generate realistic prices based on type and city
            if ($type === 'sale') {
                $price = rand(200000, 1500000);
            } elseif ($type === 'rent') {
                $price = rand(800, 5000);
            } else { // sold
                $price = rand(180000, 1200000);
            }

            $bedrooms = rand(1, 5);
            $bathrooms = max(1, $bedrooms - rand(0, 1));

            $properties[] = [
                'title' => $this->generatePropertyTitle($bedrooms, $bathrooms, $cities[$cityIndex], $type),
                'description' => $this->generatePropertyDescription($bedrooms, $bathrooms, $cities[$cityIndex], $type),
                'price' => $price,
                'type' => $type,
                'address' => rand(1000, 9999) . ' ' . $this->generateStreetName(),
                'city' => $cities[$cityIndex],
                'state' => $states[$cityIndex],
                'zip_code' => str_pad(rand(10000, 99999), 5, '0', STR_PAD_LEFT),
                'bedrooms' => $bedrooms,
                'bathrooms' => $bathrooms,
                'square_feet' => rand(800, 4000),
                'images' => [$this->getRandomPropertyImage()],
                'featured' => rand(0, 10) === 0 // 10% chance of being featured
            ];
        }

        foreach ($properties as $property) {
            Property::create($property);
        }

        // Create sample testimonials
        $testimonials = [
            [
                'name' => 'John Smith',
                'transaction_type' => 'bought',
                'amount' => 350000,
                'testimonial' => 'Amazing experience! Found my dream home through this platform.',
                'property_address' => '123 Oak Street, Boston'
            ],
            [
                'name' => 'Sarah Johnson',
                'transaction_type' => 'rented',
                'amount' => 2500,
                'testimonial' => 'Quick and easy rental process. Love my new apartment!',
                'property_address' => '456 Pine Ave, Chicago'
            ],
            // Add more testimonials...
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }

    private function generatePropertyTitle($bedrooms, $bathrooms, $city, $type)
    {
        $adjectives = ['Beautiful', 'Stunning', 'Modern', 'Luxurious', 'Cozy', 'Spacious', 'Charming', 'Elegant'];
        $nouns = ['Home', 'Apartment', 'Condo', 'House', 'Villa', 'Townhouse', 'Loft', 'Residence'];
        $locationTypes = ['Downtown', 'Uptown', 'Historic District', 'Waterfront', 'Suburban', 'Urban'];

        $adjective = $adjectives[array_rand($adjectives)];
        $noun = $nouns[array_rand($nouns)];
        $location = $locationTypes[array_rand($locationTypes)];

        return "$adjective {$bedrooms}BD/{$bathrooms}BA $noun in $location $city";
    }

    private function generatePropertyDescription($bedrooms, $bathrooms, $city, $type)
    {
        $features = [
            'hardwood floors',
            'stainless steel appliances',
            'granite countertops',
            'walk-in closet',
            'private balcony',
            'fireplace',
            'updated kitchen',
            'renovated bathroom',
            'open floor plan',
            'high ceilings',
            'natural light',
            'garage parking',
            'swimming pool',
            'fitness center',
            'rooftop terrace'
        ];

        $selectedFeatures = array_rand($features, min(4, count($features)));
        if (!is_array($selectedFeatures)) {
            $selectedFeatures = [$selectedFeatures];
        }

        $featureList = '';
        foreach ($selectedFeatures as $index => $featureIndex) {
            $featureList .= $features[$featureIndex];
            if ($index < count($selectedFeatures) - 1) {
                $featureList .= ', ';
            }
        }

        $typeText = $type === 'sale' ? 'for sale' : ($type === 'rent' ? 'for rent' : 'recently sold');

        return "This beautiful {$bedrooms}-bedroom, {$bathrooms}-bathroom property is $typeText in the heart of $city. " .
            "Features include $featureList. Perfect for " .
            ($type === 'rent' ? 'professionals or students.' : 'families or investors.') .
            " Don't miss this opportunity!";
    }

    private function generateStreetName()
    {
        $streets = ['Main', 'Oak', 'Pine', 'Maple', 'Cedar', 'Elm', 'Washington', 'Lincoln', 'Jefferson', 'Park'];
        $suffixes = ['St', 'Ave', 'Blvd', 'Ln', 'Dr', 'Way', 'Ct'];

        return $streets[array_rand($streets)] . ' ' . $suffixes[array_rand($suffixes)];
    }

    private function getRandomPropertyImage()
    {
        $images = [
            'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
            'https://images.unsplash.com/photo-1484154218962-a197022b5858?ixlib=rb-4.0.3&auto=format&fit=crop&w=2074&q=80',
            'https://images.unsplash.com/photo-1513584684374-8bab748fbf90?ixlib=rb-4.0.3&auto=format&fit=crop&w=2060&q=80',
            'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
            'https://images.unsplash.com/photo-1518780664697-55e3ad937233?ixlib=rb-4.0.3&auto=format&fit=crop&w=2060&q=80',
            'https://images.unsplash.com/photo-1540518614846-7eded1027f2b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2057&q=80',
            'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
            'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
            'https://images.unsplash.com/photo-1510798831971-661eb04b3739?ixlib=rb-4.0.3&auto=format&fit=crop&w=2060&q=80',
            'https://images.unsplash.com/photo-1555854877-bab0e564b8d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=2060&q=80'
        ];

        return $images[array_rand($images)];
    }
}
