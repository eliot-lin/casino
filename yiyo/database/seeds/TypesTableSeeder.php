<?php

use Illuminate\Database\Seeder;
use App\Models\Type;
class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function type($data)
    {
        switch($data)
        {
            case 1:
                return "諮詢";
            case 2:
                return "掛號";
            case 3:
                return "出診";
            case 4:
                return "急診";
            case 5:
                return "委託諮詢";
            case 6:
                return "委託掛號";
            case 7:
                return "委託出診";
            case 8:
                return "關懷";
            case 9:
                return "健檢";
            case 10:
                return "送藥";
        }
    }
    public function color($data)
    {
        switch($data)
        {
            case 1:
                return "綠色";
            case 2:
                return "藍色";
            case 3:
                return "橘色";
            case 4:
                return "紅色";
            case 5:
                return "黃色";
            case 6:
                return "紫色";
            case 7:
                return "灰色";
            case 8:
                return "黑色";
            case 9:
                return "灰色";
            case 10:
                return "黑色";
        }
    }
    public function run()
    {
        //
        for($i = 1;$i<=10;$i++)
        {
            $type = ['name' => self::type($i), 'color' => self::color($i)];
            Type::create($type);
        }
    }
}
