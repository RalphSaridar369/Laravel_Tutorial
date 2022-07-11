<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 10; $i++)
            Warehouse::create(['warehouse_name' => "Warehouse ".Str::random(1)]);
    }
}
