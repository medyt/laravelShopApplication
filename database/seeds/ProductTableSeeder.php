<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'title' => 'capsuni',
            'description' => 'sunt rosii',
            'price' => 20
        ]);
        $product->save();
    }
}
