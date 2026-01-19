<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Ropa Deportiva', 'destacar' => true],
            ['name' => 'Fajas', 'destacar' => true],
            ['name' => 'Accesorios', 'destacar' => false],
            ['name' => 'Tomatodos', 'destacar' => false],
            ['name' => 'Equipamiento', 'destacar' => false],
        ];

        foreach ($categories as $category) {
            $slug = Str::slug($category['name']);
            Category::updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => $category['name'],
                    'slug' => $slug,
                    'description' => 'Categoria GLAMFIT.',
                    'url_image' => 'images/img/',
                    'name_image' => 'noimagen.jpg',
                    'destacar' => $category['destacar'],
                    'fit' => 'contain',
                    'visible' => true,
                    'status' => true,
                    'is_menu' => true,
                    'img_talla' => null,
                ]
            );
        }
    }
}
