<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Warehouse;
use Illuminate\Support\Str;
use App\Models\EmployeeType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
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
        $all_employee_type = EmployeeType::all();
        for ($i = 0; $i < 40; $i++){
            $employee_type_id = rand(1,sizeof($all_employee_type));
            $warehouse_id = rand(1,sizeof($all_warehouses));
            Employee::create(
                [
                    'email' => Str::random(10).'@hotmail.com',
                    'password' => Str::random(10),
                    'employee_type_id' => $employee_type_id,
                    'warehouse_id' => $warehouse_id,
                    ]
            );}
    }
}
