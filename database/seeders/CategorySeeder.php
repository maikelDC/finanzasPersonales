<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name'=>'Alimentacion','type'=>'egreso']); 
        Category::create(['name'=>'Transporte','type'=>'egreso']); 
        Category::create(['name'=>'Salud','type'=>'egreso']); 
        Category::create(['name'=>'Entretenimiento','type'=>'egreso']); 
        Category::create(['name'=>'Sueldos','type'=>'ingreso']); 
        Category::create(['name'=>'Inversiones','type'=>'ingreso']); 
        Category::create(['name'=>'Otros','type'=>'egreso']); 
        Category::create(['name'=>'Ahorros','type'=>'egreso']); 
        Category::create(['name'=>'Otros Ingresos','type'=>'ingreso']); 
        Category::create(['name'=>'Otros Gastos','type'=>'egreso']);
    }
}
