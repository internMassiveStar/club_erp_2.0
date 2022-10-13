<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Weightage;

class WeightageSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            ['id'=>1,'msp1'=>0.25,'msp2'=>.15,'msp3'=>.16,'msp4'=>.04,'msp5'=>.04,'msp6'=>.04,'msp7'=>.04,'msp8'=>.04,'msp9'=>.04,'msp10'=>.20]
        ];
        Weightage::insert($records);
    }
}
