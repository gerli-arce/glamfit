<?php

namespace Database\Seeders;

use App\Models\Banners;
use Illuminate\Database\Seeder;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'title' => 'GLAMFIT',
                'description' => 'Ropa y accesorios para gimnasio.',
                'title_btn' => 'Ver catalogo',
                'url_btn' => '/catalogo',
                'price' => 'images/img/banner_AB.PNG',
                'image' => 'images/img/banner_AB.PNG',
                'potition' => 'medio',
                'url_page' => '/catalogo',
                'visible' => true,
                'status' => true,
            ],
            [
                'title' => 'Entrena con estilo',
                'description' => 'Fajas, tomatodos y equipamiento.',
                'title_btn' => 'Comprar ahora',
                'url_btn' => '/catalogo',
                'price' => 'S/ 79.90',
                'image' => 'images/img/banner_AB.PNG',
                'potition' => 'inferior',
                'url_page' => '/catalogo',
                'visible' => true,
                'status' => true,
            ],
        ];

        foreach ($banners as $banner) {
            Banners::updateOrCreate(
                ['title' => $banner['title'], 'potition' => $banner['potition']],
                $banner
            );
        }
    }
}
