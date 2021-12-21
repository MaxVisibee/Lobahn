<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SuitabilityRatio;

class SuitabilityRatioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ratios= [
            [
                'name'              => 'Location',
                'talent_num'        => '24',
                'talent_percent'    => '8.1',
                'position_num'      => '20',
                'position_percent'  => '5.5',
            ],
            [
                'name'              => 'Contract terms',
                'talent_num'        => '20',
                'talent_percent'    => '6.8',
                'position_num'      => '16',
                'position_percent'  => '4.4',
            ],
            [
                'name'              => 'Target pay',
                'talent_num'        => '44',
                'talent_percent'    => '14.9',
                'position_num'      => '40',
                'position_percent'  => '11.0',
            ],
            [
                'name'              => 'Contract hours',
                'talent_num'        => '20',
                'talent_percent'    => '6.8',
                'position_num'      => '4',
                'position_percent'  => '1.1',
            ],
            [
                'name'              => 'Keywords',
                'talent_num'        => '16',
                'talent_percent'    => '5.4',
                'position_num'      => '24',
                'position_percent'  => '6.6',
            ],
            [
                'name'              => 'Management level',
                'talent_num'        => '12',
                'talent_percent'    => '4.1',
                'position_num'      => '12',
                'position_percent'  => '3.3',
            ],
            [
                'name'              => 'Years',
                'talent_num'        => '8',
                'talent_percent'    => '2.7',
                'position_num'      => '12',
                'position_percent'  => '3.3',
            ],
            [
                'name'              => 'Educational level',
                'talent_num'        => '8',
                'talent_percent'    => '2.7',
                'position_num'      => '16',
                'position_percent'  => '4.4',
            ],
            [
                'name'              => 'Academic institutions',
                'talent_num'        => '4',
                'talent_percent'    => '1.4',
                'position_num'      => '8',
                'position_percent'  => '2.2',
            ],
            [
                'name'              => 'Languages',
                'talent_num'        => '4',
                'talent_percent'    => '1.4',
                'position_num'      => '16',
                'position_percent'  => '4.4',
            ],
            [
                'name'              => 'Geographic experience',
                'talent_num'        => '8',
                'talent_percent'    => '2.7',
                'position_num'      => '12',
                'position_percent'  => '3.3',
            ],
            [
                'name'              => 'People management',
                'talent_num'        => '12',
                'talent_percent'    => '4.1',
                'position_num'      => '12',
                'position_percent'  => '3.3',
            ],
            [
                'name'              => 'Software & tech knowledge',
                'talent_num'        => '8',
                'talent_percent'    => '2.7',
                'position_num'      => '16',
                'position_percent'  => '4.4',
            ],
            [
                'name'              => 'Fields of study',
                'talent_num'        => '8',
                'talent_percent'    => '2.7',
                'position_num'      => '12',
                'position_percent'  => '3.3',
            ],
            [
                'name'              => 'Qualifications & certifications',
                'talent_num'        => '8',
                'talent_percent'    => '2.7',
                'position_num'      => '16',
                'position_percent'  => '4.4',
            ],
            [
                'name'              => 'Professional strengths',
                'talent_num'        => '16',
                'talent_percent'    => '5.4',
                'position_num'      => '16',
                'position_percent'  => '4.4',
            ],
            [
                'name'              => 'Position title',
                'talent_num'        => '4',
                'talent_percent'    => '1.4',
                'position_num'      => '12',
                'position_percent'  => '3.3',
            ],
            [
                'name'              => 'Industry',
                'talent_num'        => '16',
                'talent_percent'    => '5.4',
                'position_num'      => '16',
                'position_percent'  => '4.4',
            ],
            [
                'name'              => 'Sub-sector',
                'talent_num'        => '12',
                'talent_percent'    => '4.1',
                'position_num'      => '24',
                'position_percent'  => '6.6',
            ],
            [
                'name'              => 'Function',
                'talent_num'        => '16',
                'talent_percent'    => '5.4',
                'position_num'      => '16',
                'position_percent'  => '4.4',
            ],
            [
                'name'              => 'Specialty',
                'talent_num'        => '12',
                'talent_percent'    => '4.1',
                'position_num'      => '24',
                'position_percent'  => '6.6',
            ],
            [
                'name'              => 'Target companies',
                'talent_num'        => '16',
                'talent_percent'    => '5.4',
                'position_num'      => '20',
                'position_percent'  => '5.5',
            ],
        ];

        SuitabilityRatio::insert($ratios);
    }
}
