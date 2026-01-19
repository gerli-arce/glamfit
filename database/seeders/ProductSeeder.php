<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

use App\Models\Products;
use App\Models\SubCategory;
use App\Models\ClientLogos;
use App\Models\Discount;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brand = ClientLogos::where('title', 'GLAMFIT')->first();
        $discounts = Discount::whereIn('name', [
            '2x1 en fajas',
            '3x2 en accesorios',
            '10% en tomatodos',
            '20% en ropa deportiva',
        ])->get()->keyBy('name');

        $items = [
            ['name' => 'Polo deportivo dry fit', 'category' => 'Ropa Deportiva', 'subcategory' => 'Polos', 'sku' => 'GLAM-POLO-001', 'price' => 79.90, 'discount' => 59.90, 'color' => 'Negro', 'size' => 'M', 'stock' => 20, 'featured' => true],
            ['name' => 'Leggings compresion', 'category' => 'Ropa Deportiva', 'subcategory' => 'Leggings', 'sku' => 'GLAM-LEG-001', 'price' => 99.90, 'discount' => 0, 'color' => 'Negro', 'size' => 'S', 'stock' => 15, 'featured' => true],
            ['name' => 'Short training', 'category' => 'Ropa Deportiva', 'subcategory' => 'Shorts', 'sku' => 'GLAM-SHO-001', 'price' => 69.90, 'discount' => 0, 'color' => 'Gris', 'size' => 'M', 'stock' => 18, 'featured' => false],
            ['name' => 'Conjunto deportivo', 'category' => 'Ropa Deportiva', 'subcategory' => 'Conjuntos', 'sku' => 'GLAM-CON-001', 'price' => 149.90, 'discount' => 129.90, 'color' => 'Azul', 'size' => 'M', 'stock' => 10, 'featured' => true],
            ['name' => 'Faja reductora neopreno', 'category' => 'Fajas', 'subcategory' => 'Fajas reductoras', 'sku' => 'GLAM-FAJ-001', 'price' => 89.90, 'discount' => 0, 'color' => 'Negro', 'size' => 'Unico', 'stock' => 25, 'featured' => true],
            ['name' => 'Faja deportiva lumbar', 'category' => 'Fajas', 'subcategory' => 'Fajas deportivas', 'sku' => 'GLAM-FAJ-002', 'price' => 79.90, 'discount' => 69.90, 'color' => 'Negro', 'size' => 'Unico', 'stock' => 30, 'featured' => false],
            ['name' => 'Guantes de gimnasio', 'category' => 'Accesorios', 'subcategory' => 'Guantes', 'sku' => 'GLAM-ACC-001', 'price' => 49.90, 'discount' => 0, 'color' => 'Negro', 'size' => 'M', 'stock' => 40, 'featured' => false],
            ['name' => 'Bandas elasticas set', 'category' => 'Accesorios', 'subcategory' => 'Bandas elasticas', 'sku' => 'GLAM-ACC-002', 'price' => 59.90, 'discount' => 0, 'color' => 'Multicolor', 'size' => 'Unico', 'stock' => 35, 'featured' => false],
            ['name' => 'Munequeras deportivas', 'category' => 'Accesorios', 'subcategory' => 'Munequeras', 'sku' => 'GLAM-ACC-003', 'price' => 39.90, 'discount' => 0, 'color' => 'Negro', 'size' => 'Unico', 'stock' => 50, 'featured' => false],
            ['name' => 'Tomatodo 750ml', 'category' => 'Tomatodos', 'subcategory' => 'Tomatodos deportivos', 'sku' => 'GLAM-TOM-001', 'price' => 35.90, 'discount' => 0, 'color' => 'Transparente', 'size' => 'Unico', 'stock' => 60, 'featured' => true],
            ['name' => 'Tomatodo termico 1L', 'category' => 'Tomatodos', 'subcategory' => 'Tomatodos termicos', 'sku' => 'GLAM-TOM-002', 'price' => 69.90, 'discount' => 0, 'color' => 'Negro', 'size' => 'Unico', 'stock' => 25, 'featured' => false],
            ['name' => 'Mancuernas 5kg par', 'category' => 'Equipamiento', 'subcategory' => 'Mancuernas', 'sku' => 'GLAM-EQP-001', 'price' => 129.90, 'discount' => 0, 'color' => 'Negro', 'size' => 'Unico', 'stock' => 12, 'featured' => true],
            ['name' => 'Colchoneta yoga', 'category' => 'Equipamiento', 'subcategory' => 'Colchonetas', 'sku' => 'GLAM-EQP-002', 'price' => 79.90, 'discount' => 0, 'color' => 'Azul', 'size' => 'Unico', 'stock' => 22, 'featured' => false],
            ['name' => 'Cuerda de salto', 'category' => 'Equipamiento', 'subcategory' => 'Cuerdas de salto', 'sku' => 'GLAM-EQP-003', 'price' => 29.90, 'discount' => 0, 'color' => 'Negro', 'size' => 'Unico', 'stock' => 70, 'featured' => false],
        ];

        foreach ($items as $item) {
            $category = Category::where('slug', Str::slug($item['category']))->first();
            if (!$category) {
                continue;
            }

            $subcategory = SubCategory::where('slug', Str::slug($item['subcategory']))
                ->where('category_id', $category->id)
                ->first();

            $discountId = null;
            if ($item['category'] === 'Fajas') {
                $discountId = $discounts['2x1 en fajas']->id ?? null;
            } elseif ($item['category'] === 'Accesorios') {
                $discountId = $discounts['3x2 en accesorios']->id ?? null;
            } elseif ($item['category'] === 'Tomatodos') {
                $discountId = $discounts['10% en tomatodos']->id ?? null;
            } elseif ($item['category'] === 'Ropa Deportiva') {
                $discountId = $discounts['20% en ropa deportiva']->id ?? null;
            }

            $discount = $item['discount'];
            $price = $item['price'];
            $percent = 0;
            if ($discount > 0 && $price > 0) {
                $percent = (1 - ($discount / $price)) * 100;
            }

            Products::updateOrCreate(
                ['sku' => $item['sku']],
                [
                    'producto' => $item['name'],
                    'extract' => $item['name'],
                    'description' => 'Producto GLAMFIT para entrenamiento.',
                    'precio' => $price,
                    'descuento' => $discount,
                    'percent_discount' => $percent,
                    'stock' => $item['stock'],
                    'costo_x_art' => 0,
                    'peso' => $item['size'],
                    'imagen' => 'images/img/noimagen.jpg',
                    'imagen_ambiente' => 'images/img/noimagen.jpg',
                    'sku' => $item['sku'],
                    'categoria_id' => $category->id,
                    'subcategory_id' => $subcategory?->id,
                    'marca_id' => $brand?->id,
                    'discount_id' => $discountId,
                    'color' => $item['color'],
                    'destacar' => $item['featured'],
                    'recomendar' => $item['featured'],
                    'visible' => true,
                    'status' => true,
                ]
            );
        }
    }
}
