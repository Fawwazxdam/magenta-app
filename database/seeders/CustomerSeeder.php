<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            [
                'name' => 'PT.Sekar Laut TBK.',
                'email' => 'purchasing@sekarlaut.id',
                'phone_number' => '08123456789',
                'whatsapp' => '08123456789',
                'province' => 'Jawa Timur',
                'city' => 'Sidoarjo',
                'district' => 'Sidoarjo',
                'urban_village' => 'Pucang',
                'address' => 'Jl. Jenggolo II/17',
                'additional_address' => '-',
                'coordinate' => '-7.439121453153504, 112.72450626728181',
                'created_on' => now(),
            ],
            [
                'name' => 'Magenta Design',
                'email' => 'magentadesign@proton.me',
                'phone_number' => '081234567890',
                'whatsapp' => '081234567890',
                'province' => 'Jawa Timur',
                'city' => 'Pasuruan',
                'district' => 'Pandaan',
                'urban_village' => 'Submer Gedang',
                'address' => 'Kemisik, Jl. Jaksa Agung Suprapto No.16',
                'additional_address' => '67156',
                'coordinate' => '-7.65083399250179, 112.68449826728455',
                'created_on' => now(),
            ],
        ];
        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
