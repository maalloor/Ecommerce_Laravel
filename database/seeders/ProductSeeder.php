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
        Product::create([
            'name' => 'Buso Blanco',
            'description' => "El blanco va con todo así que puedes\n
                            combinarlo con lo que sea ya sean\n
                            pantalones de cuadros o gabardina.",
            'price' => 35.5,
            'size' => 'S',
            'category_id' => 2,
            'image' => "buzo_negro.PNG"
        ]);

        Product::create([
            'name' => 'Camisa Azul Mangas Cortas',
            'description' => "El blanco va con todo así que puedes\n
                            combinarlo con lo que sea ya sean\n
                            pantalones de cuadros o gabardina.",
            'price' => 30.5,
            'size' => 'M',
            'category_id' => 1,
            'image' => "camisa_negro.PNG"
        ]);

        /*
        Product::create([
            'name' => 'Vestido Turquesa',
            'description' => "El negro va con todo así que puedes combinarlo con \n
                            lo que sea ya sean pantalones de cuadros o gabardina.",
            'price' => 45,
            'size' => 'S',
            'category_id' => 4,
            'image' => "vestido.PNG"
        ]);
        */
    }
}
