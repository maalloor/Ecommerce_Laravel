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
            'name' => 'Buso Negro',
            'description' => "El negro va con todo así que puedes combinarlo con \n
                            lo que sea ya sean pantalones de cuadros o gabardina.",
            'price' => 35,
            'size' => 'S',
            'category_id' => 2,
            'image' => "buzo_negro.PNG"
        ]);

        Product::create([
            'name' => 'Camisa Vino Tinto',
            'description' => "El negro va con todo así que puedes combinarlo con \n
                            lo que sea ya sean pantalones de cuadros o gabardina.",
            'price' => 30,
            'size' => 'M',
            'category_id' => 1,
            'image' => "camisa_negro.PNG"
        ]);

        Product::create([
            'name' => 'Vestido Turquesa',
            'description' => "El negro va con todo así que puedes combinarlo con \n
                            lo que sea ya sean pantalones de cuadros o gabardina.",
            'price' => 45,
            'size' => 'S',
            'category_id' => 4,
            'image' => "vestido.PNG"
        ]);

    }
}
