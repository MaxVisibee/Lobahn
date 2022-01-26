<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Package;

class PackageTableSeeder extends Seeder
{
    public function run()
    {
        $packages = [
            [
                'package_title'  => 'Annual Membership',
                'package_for'    => 'individual',
                'package_type'   => 'basic',
                'package_num_days'=> 365,
                'package_price' => 80,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'package_title'  => 'Annual Membership',
                'package_for'    => 'individual',
                'package_type'   => 'premium',
                'package_num_days'=> 365,
                'package_price' => 8850,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'package_title'  => '90-day Plan',
                'package_for'    => 'corporate',
                'package_type'   => 'basic',
                'package_num_days'=> 90,
                'package_price' => 1295,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'package_title'  => 'One-year Plan',
                'package_for'    => 'corporate',
                'package_type'   => 'basic',
                'package_num_days'=> 90,
                'package_price' => 3885,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'package_title'  => 'Two-year Plan',
                'package_for'    => 'corporate',
                'package_type'   => 'basic',
                'package_num_days'=> 730,
                'package_price' => 5180,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'package_title'  => '90-DAY LISTING PROMOTION SERVICE',
                'package_for'    => 'corporate',
                'package_type'   => 'premium',
                'package_num_days'=> 90,
                'package_price' => 8800,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
        ];
        Package::insert($packages);
    }
}
