<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Discount;
use App\Models\DiscountType;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unitTypeId = DiscountType::where('name', 'Unidad')->value('id');
        $percentTypeId = DiscountType::where('name', 'Porcentual')->value('id');

        $discounts = [
            [
                'name' => '2x1 en fajas',
                'take_product' => 2,
                'payment_product' => 1,
                'type_id' => $unitTypeId,
                'apply_to' => 'lower',
            ],
            [
                'name' => '3x2 en accesorios',
                'take_product' => 3,
                'payment_product' => 2,
                'type_id' => $unitTypeId,
                'apply_to' => 'lower',
            ],
            [
                'name' => '10% en tomatodos',
                'take_product' => 1,
                'payment_product' => 90,
                'type_id' => $percentTypeId,
                'apply_to' => 'self',
            ],
            [
                'name' => '20% en ropa deportiva',
                'take_product' => 1,
                'payment_product' => 80,
                'type_id' => $percentTypeId,
                'apply_to' => 'self',
            ],
        ];

        foreach ($discounts as $discount) {
            Discount::updateOrCreate(
                ['name' => $discount['name']],
                [
                    'name' => $discount['name'],
                    'take_product' => $discount['take_product'],
                    'payment_product' => $discount['payment_product'],
                    'type_id' => $discount['type_id'],
                    'apply_to' => $discount['apply_to'],
                    'visible' => true,
                    'status' => true,
                ]
            );
        }
    }
}
