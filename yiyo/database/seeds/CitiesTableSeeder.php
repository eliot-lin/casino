<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cities =[
            ['region_id' => 1, 'name' => '基隆市'],
            ['region_id' => 1, 'name' => '台北市'],
            ['region_id' => 1, 'name' => '新北市'],
            ['region_id' => 1, 'name' => '桃園市'],
            ['region_id' => 1, 'name' => '新竹市'],
            ['region_id' => 2, 'name' => '苗栗市'],
            ['region_id' => 2, 'name' => '台中市'],
            ['region_id' => 2, 'name' => '彰化市'],
            ['region_id' => 2, 'name' => '南投市'],
            ['region_id' => 3, 'name' => '雲林市'],
            ['region_id' => 3, 'name' => '嘉義市'],
            ['region_id' => 3, 'name' => '台南市'],
            ['region_id' => 3, 'name' => '高雄市'],
            ['region_id' => 3, 'name' => '屏東市'],
            ['region_id' => 4, 'name' => '宜蘭市'],
            ['region_id' => 4, 'name' => '花蓮市'],
            ['region_id' => 4, 'name' => '台東市'],
        ];
        foreach($cities as $city)
        {
            City::create($city);
        }
    }
}
