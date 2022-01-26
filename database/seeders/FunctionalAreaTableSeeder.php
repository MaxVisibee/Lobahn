<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FunctionalArea;

class FunctionalAreaTableSeeder extends Seeder
{
    public function run(){
        $functional_areas= [
            [               
                'area_name'    => 'Communications',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   
            [               
                'area_name'    => 'Creative & design',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   
            [               
                'area_name'    => 'Customer service management',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   
            [               
                'area_name'    => 'Finance & accounting',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   
            [               
                'area_name'    => 'Financial trading & brokerage',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   
            [               
                'area_name'    => 'General management',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   
            [               
                'area_name'    => 'Human resources',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   
            [               
                'area_name'    => 'Information technology',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   
            [               
                'area_name'    => 'Legal & compliance',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   
            [               
                'area_name'    => 'Logistics & distribution',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   
            [               
                'area_name'    => 'Merchandising',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   
            [               
                'area_name'    => 'Office management & executive support',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   

            [               
                'area_name'    => 'Operations',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   [               
                'area_name'    => 'Product development',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   
            [               
                'area_name'    => 'Research & data analysis',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   
            [               
                'area_name'    => 'Sales & marketing',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   
            [               
                'area_name'    => 'Scientific research & support',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   
            [               
                'area_name'    => 'Strategy & corporate development',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],   
            [               
                'area_name'    => 'Top Management',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ] 
        ];
      
         FunctionalArea::insert($functional_areas);
    }
}
