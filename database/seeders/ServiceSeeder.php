<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder {
    public function run(): void {
        Service::create([
            'service_name' => 'Cuci Kiloan Reguler',
            'category' => 'Kiloan',
            'price_per_unit' => 7000,
            'unit_type' => 'Kg',
            'description' => 'Cuci + setrika 2-3 hari']);

        Service::create([
            'service_name' => 'Express 6 Jam',
            'category' => 'Express',
            'price_per_unit' => 15000,
            'unit_type' => 'Kg',
            'description' => 'Selesai dalam 6 jam'
        ]);
        Service::create([
            'service_name' => 'Dry Cleaning Jas',
            'category' => 'Satuan',
            'price_per_unit' => 35000,
            'unit_type' => 'Pcs',
            'description' => 'Jas dan blazer'
        ]);
    }
}
