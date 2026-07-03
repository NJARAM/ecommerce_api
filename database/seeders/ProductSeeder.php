<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                Product::insert([
            [
                'category' => 'Electronics',
                'name' => 'Laptop',
                'description' => 'A high-performance laptop for work and play.',
                'price' => 85000,
                'stock' => 0
            ],
            [
                'category' => 'Electronics',
                'name' => 'Smartphone',
                'description' => 'A sleek and powerful smartphone with a stunning display.',
                'price' => 45000,
                'stock' => 0
            ],
            [
                'category' => 'Clothing',
                'name' => 'T-Shirt',
                'description' => 'A comfortable and stylish t-shirt for everyday wear.',
                'price' => 1500,
                'stock' => 0
            ],
            [
                'category' => 'Books',
                'name' => 'Laravel Book',
                'description' => 'A comprehensive guide to Laravel web development.',
                'price' => 3000,
                'stock' => 0
            ],
            [
                'category' => 'Food',
                'name' => 'Coffee',
                'description' => 'A rich and aromatic coffee for your morning boost.',
                'price' => 800,
                'stock' => 0
            ],
        ]);
    }
}
