<?php

use Illuminate\Database\Seeder;
use App\Models\Region;
class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $regions = [
            ['name' => '北部', 'no'=> 'N'],
            ['name' => '中部', 'no'=> 'C'],
            ['name' => '南部', 'no'=> 'S'],
            ['name' => '東部', 'no'=> 'E']
        ];
        foreach($regions as $region)
        {
            Region::create($region);
        }
    }
}
