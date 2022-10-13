<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mspreferredfund;
class ReferredFundSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id'=>1,'member_id'=>'101','total_amount'=>500000,'referred_id'=>'106'],
            ['id'=>2,'member_id'=>'103','total_amount'=>400000,'referred_id'=>'101'],
            ['id'=>3,'member_id'=>'104','total_amount'=>750000,'referred_id'=>'101'],
            ['id'=>4,'member_id'=>'106','total_amount'=>500000,'referred_id'=>'101'],
        ];
        Mspreferredfund::insert($data);
    }
}
