<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slides = [
            [
                'order' => 1,
                'title' => 'GLAMFIT',
                'description' => 'Ropa y accesorios de gimnasio.',
                'botontext1' => null,
                'link1' => 'images/img/carrusel2_AB.PNG',
                'botontext2' => 'Ver catalogo',
                'link2' => '/catalogo',
                'url_image' => 'images/img/',
                'name_image' => 'carrusel2_AB.PNG',
                'visible' => true,
                'status' => true,
            ],
            [
                'order' => 2,
                'title' => 'Entrena con estilo',
                'description' => 'Fajas, tomatodos y equipamiento.',
                'botontext1' => null,
                'link1' => 'images/img/carrusel3_AB.PNG',
                'botontext2' => 'Comprar ahora',
                'link2' => '/catalogo',
                'url_image' => 'images/img/',
                'name_image' => 'carrusel3_AB.PNG',
                'visible' => true,
                'status' => true,
            ],
        ];

        foreach ($slides as $slide) {
            Slider::updateOrCreate(
                ['order' => $slide['order']],
                $slide
            );
        }
    }
}
