<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $all_categories = Category::all();
        for ($i = 0; $i < 10; $i++){
            $cat_id = rand(1,sizeof($all_categories));
            $price = rand(100,1000);
            Product::create(
                [
                    'product_name' => 'Product '. Str::random(1),
                    'price' => $price,
                    'category_id' => $cat_id,
                    ]
            );}
    }
}
