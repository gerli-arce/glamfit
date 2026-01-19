<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Offer;
use App\Models\Products;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $combos = [
            [
                'name' => 'Combo Entrenamiento',
                'skus' => ['GLAM-POLO-001', 'GLAM-ACC-001', 'GLAM-TOM-001'],
                'discount' => 139.90,
            ],
            [
                'name' => 'Combo Faja + Accesorios',
                'skus' => ['GLAM-FAJ-001', 'GLAM-ACC-002', 'GLAM-ACC-003'],
                'discount' => 159.90,
            ],
            [
                'name' => 'Combo Equipamiento',
                'skus' => ['GLAM-EQP-001', 'GLAM-EQP-002', 'GLAM-EQP-003'],
                'discount' => 199.90,
            ],
        ];

        foreach ($combos as $combo) {
            $products = Products::whereIn('sku', $combo['skus'])->get();
            if ($products->isEmpty()) {
                continue;
            }

            $parentSku = $combo['skus'][0];
            $parent = $products->firstWhere('sku', $parentSku) ?? $products->first();
            $totalPrice = $products->sum('precio');

            $offer = Offer::updateOrCreate(
                ['producto' => $combo['name']],
                [
                    'producto' => $combo['name'],
                    'precio' => $totalPrice,
                    'descuento' => $combo['discount'],
                    'imagen' => $parent?->imagen ?? 'images/img/noimagen.jpg',
                ]
            );

            $offer->status = true;
            $offer->save();
        }
    }
}
