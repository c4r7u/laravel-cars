<?php

use Illuminate\Database\Seeder;
use App\Car;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars_array = config('cars');
        foreach($cars_array as $car) {
            $new_car = new Car();
            $new_car -> brand = $car['brand'];
            $new_car -> model=$car['model'];
            $new_car -> power=$car['power'];
            $new_car -> doors=$car['doors'];
            $new_car -> thumb=$car['thumb'];
            $new_car -> save();
        }
        
    }
}
