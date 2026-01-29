<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Testimony::create([
            'name' => 'MILDRET',
            'email' => 'mildret@example.com',
            'testimonie' => 'Todo fue muy rápido y la toalla es preciosa y muy suave',
            'rating' => 5,
            'img_product' => 'images/glamfit/Mesa de trabajo 1.jpg',
            'visible' => 1,
            'status' => 1,
            'created_at' => '2025-09-05 10:00:00'
        ]);

        \App\Models\Testimony::create([
            'name' => 'ERIKA',
            'email' => 'erika@example.com',
            'testimonie' => 'Me encantó el llavero Fit, y el servicio rápido y amable 😍🤩',
            'rating' => 5,
            'img_product' => 'images/glamfit/Mesa de trabajo 2.jpg',
            'visible' => 1,
            'status' => 1,
            'created_at' => '2025-07-06 10:00:00'
        ]);

        \App\Models\Testimony::create([
            'name' => 'Xiomara',
            'email' => 'xiomara@example.com',
            'testimonie' => 'Tiene una calidad increíble, me encantó 🤤',
            'rating' => 5,
            'img_product' => 'images/glamfit/Mesa de trabajo 3.jpg',
            'visible' => 1,
            'status' => 1,
            'created_at' => '2025-06-29 10:00:00'
        ]);

        \App\Models\Testimony::create([
            'name' => 'Leidys Jose',
            'email' => 'leidys@example.com',
            'testimonie' => 'Excelente producto, las fajas son cómodas y de buena calidad.',
            'rating' => 5,
            'img_product' => 'images/glamfit/Mesa de trabajo 4.jpg',
            'visible' => 1,
            'status' => 1,
            'created_at' => '2025-06-21 10:00:00'
        ]);

        \App\Models\Testimony::create([
            'name' => 'Jaime alexis',
            'email' => 'jaime@example.com',
            'testimonie' => 'genial , me gusto mucho me encanto cuando llego y me pedi rosada perfecto la vrd',
            'rating' => 5,
            'img_product' => 'images/glamfit/Mesa de trabajo 5.jpg',
            'visible' => 1,
            'status' => 1,
            'created_at' => '2025-06-20 10:00:00'
        ]);

        \App\Models\Testimony::create([
            'name' => 'Yamilay Rusy',
            'email' => 'yamilay@example.com',
            'testimonie' => 'Me encanta los productos, las telas son de calidad, y te forma bien tu silueta, lo amé',
            'rating' => 5,
            'img_product' => 'images/glamfit/Mesa de trabajo 6.jpg',
            'visible' => 1,
            'status' => 1,
            'created_at' => '2025-06-04 10:00:00'
        ]);
    }
}
