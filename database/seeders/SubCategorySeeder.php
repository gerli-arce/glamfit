<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

use App\Models\SubCategory;
use Illuminate\Support\Str;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['category' => 'Ropa Deportiva', 'name' => 'Polos', 'order' => 1],
            ['category' => 'Ropa Deportiva', 'name' => 'Leggings', 'order' => 2],
            ['category' => 'Ropa Deportiva', 'name' => 'Shorts', 'order' => 3],
            ['category' => 'Ropa Deportiva', 'name' => 'Conjuntos', 'order' => 4],
            ['category' => 'Fajas', 'name' => 'Fajas reductoras', 'order' => 1],
            ['category' => 'Fajas', 'name' => 'Fajas deportivas', 'order' => 2],
            ['category' => 'Accesorios', 'name' => 'Guantes', 'order' => 1],
            ['category' => 'Accesorios', 'name' => 'Bandas elasticas', 'order' => 2],
            ['category' => 'Accesorios', 'name' => 'Munequeras', 'order' => 3],
            ['category' => 'Tomatodos', 'name' => 'Tomatodos deportivos', 'order' => 1],
            ['category' => 'Tomatodos', 'name' => 'Tomatodos termicos', 'order' => 2],
            ['category' => 'Equipamiento', 'name' => 'Mancuernas', 'order' => 1],
            ['category' => 'Equipamiento', 'name' => 'Colchonetas', 'order' => 2],
            ['category' => 'Equipamiento', 'name' => 'Cuerdas de salto', 'order' => 3],
        ];

        foreach ($items as $item) {
            $category = Category::where('slug', Str::slug($item['category']))->first();
            if (!$category) {
                continue;
            }

            $slug = Str::slug($item['name']);
            SubCategory::updateOrCreate(
                ['category_id' => $category->id, 'slug' => $slug],
                [
                    'category_id' => $category->id,
                    'name' => $item['name'],
                    'slug' => $slug,
                    'order' => $item['order'],
                    'description' => 'Subcategoria GLAMFIT.',
                    'url_image' => 'images/img/',
                    'name_image' => 'noimagen.jpg',
                    'destacar' => false,
                    'visible' => true,
                    'status' => true,
                ]
            );
        }
    }
}
