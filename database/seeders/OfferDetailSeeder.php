<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Offer;
use App\Models\OfferDetail;
use App\Models\Products;

class OfferDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $combos = [
            'Combo Entrenamiento' => ['GLAM-POLO-001', 'GLAM-ACC-001', 'GLAM-TOM-001'],
            'Combo Faja + Accesorios' => ['GLAM-FAJ-001', 'GLAM-ACC-002', 'GLAM-ACC-003'],
            'Combo Equipamiento' => ['GLAM-EQP-001', 'GLAM-EQP-002', 'GLAM-EQP-003'],
        ];

        foreach ($combos as $name => $skus) {
            $offer = Offer::where('producto', $name)->first();
            if (!$offer) {
                continue;
            }

            $products = Products::whereIn('sku', $skus)->get()->keyBy('sku');
            foreach ($skus as $index => $sku) {
                $product = $products->get($sku);
                if (!$product) {
                    continue;
                }

                OfferDetail::updateOrCreate(
                    [
                        'offer_id' => $offer->id,
                        'product_id' => $product->id,
                    ],
                    [
                        'isParent' => $index === 0,
                    ]
                );
            }
        }
    }
}
