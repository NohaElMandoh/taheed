<?php

namespace Database\Seeders;

use App\Models\Motorcycle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotorcyclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $motorcycles = [
            [
                'manufacturer' => 'Honda',
                'model' => 'CBR1000RR',
                'engine_size' => 1.0,
                'horsepower' => 189,
                'torque' => 86.6,
                'top_speed' => 186,
                'year' => 2023,
                'price' => 16999.99,
                'category' => 'Sportbike',
                'image_url' => 'https://example.com/cbr1000rr.jpg',
                'description' => 'The Honda CBR1000RR is a high-performance sportbike known for its agility and speed.',
            'amount'=>100
            ],
            [
                'manufacturer' => 'Kawasaki',
                'model' => 'Ninja ZX-10R',
                'engine_size' => 998,
                'horsepower' => 200,
                'torque' => 114,
                'top_speed' => 186,
                'year' => 2023,
                'price' => 17999.99,
                'category' => 'Sportbike',
                'image_url' => 'https://example.com/ninja-zx10r.jpg',
                'description' => 'The Kawasaki Ninja ZX-10R is a powerful sportbike designed for performance enthusiasts.',
                'amount'=>200
            ],
            [
                'manufacturer' => 'Harley-Davidson',
                'model' => 'Sportster Iron 883',
                'engine_size' => 883,
                'horsepower' => 50,
                'torque' => 55,
                'top_speed' => 110,
                'year' => 2023,
                'price' => 10999.99,
                'category' => 'Cruiser',
                'image_url' => 'https://example.com/sportster-iron-883.jpg',
                'description' => 'The Harley-Davidson Sportster Iron 883 is a classic cruiser with a raw, stripped-down style.',
                'amount'=>300
            ],
            // Add more motorcycles as needed
        ];

        // Loop through the motorcycles array and create records
        foreach ($motorcycles as $motorcycleData) {
            Motorcycle::create($motorcycleData);
        }
    }
}
