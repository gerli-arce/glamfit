<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ClientLogos;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['title' => 'GLAMFIT', 'destacar' => true],
            ['title' => 'PowerFit', 'destacar' => true],
            ['title' => 'FlexGym', 'destacar' => false],
            ['title' => 'ActivePro', 'destacar' => false],
            ['title' => 'CoreMove', 'destacar' => false],
        ];

        $order = 1;
        foreach ($brands as $brand) {
            ClientLogos::updateOrCreate(
                ['title' => $brand['title']],
                [
                    'title' => $brand['title'],
                    'description' => 'Marca de accesorios y ropa deportiva.',
                    'url_image' => 'images/img/noimagen.jpg',
                    'url_image2' => null,
                    'order' => $order,
                    'destacar' => $brand['destacar'],
                    'visible' => true,
                    'status' => true,
                ]
            );
            $order++;
        }
    }
}
