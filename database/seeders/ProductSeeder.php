<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name'  =>  'Sinigang',
                'price' =>  '150'
            ],
            [
                'name'  =>  'Adobong Manok',
                'price' =>  '120'
            ],
            [
                'name'  =>  'Afritada',
                'price' =>  '95'
            ],
            [
                'name'  =>  'Chicken Curry',
                'price' =>  '80'
            ],
            [
                'name'  =>  'Lumpia',
                'price' =>  '50'
            ],
            [
                'name'  =>  'Seafood Soap',
                'price' =>  '90'
            ],
        ];

        Product::insert($products);

    }
}
