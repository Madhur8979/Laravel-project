<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name'=>'Fridge',
                'prise'=> 8000,
                'category'=>'Electronic',
                'discription'=>'smart fridge with advance feature.',
                'gallery'=>'https://unsplash.com/photos/Eb6hMEhGlKY',
                
            ],
            [
                'name'=>'Washing Machine',
                'prise'=> 4000,
                'category'=>'Electronic',
                'discription'=>'Smart washing machine with advance feature.',
                'gallery'=>'https://unsplash.com/photos/nUL_PP69IPA',
                
            ],
            [
                'name'=>'Tablet',
                'prise'=> 5000,
                'category'=>'Tablet',
                'discription'=>'Tablet with advance feature.',
                'gallery'=>'https://unsplash.com/photos/EhbuqJYNCRk',
                
            ],
            [
                'name'=>'Television',
                'prise'=> 6000,
                'category'=>'Electronic',
                'discription'=>'Smart TV with advance feature.',
                'gallery'=>'https://unsplash.com/photos/AzHPen-cymc',
                
            ]
        ]);
    }
}
