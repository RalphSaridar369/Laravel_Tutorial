<?php

namespace Database\Seeders;

use App\Models\HasProducts;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class HasProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $all_warehouses = Warehouse::all();
        $all_products = Product::all();
        for ($i = 0; $i < 40; $i++){
            $product_id = rand(1,sizeof($all_products));
            $warehouse_id = rand(1,sizeof($all_warehouses));
            $quantity = rand(50,200);
            HasProducts::create(
                [
                    'warehouse_id' => $warehouse_id,
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                    ]
            );}
    }
}
