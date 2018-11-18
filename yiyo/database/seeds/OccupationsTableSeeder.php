<?php

use Illuminate\Database\Seeder;
use App\Models\Occupation;
class OccupationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function occupation($data)
    {
        switch($data)
        {
            case 1:
                return "醫師";
            case 2:
                return "護理師";
            case 3:
                return "治療師";
        }
    }
    public function run()
    {
        //
        for($i = 1;$i <= 3;$i++)
        {
            $occupation = ['name' => self::occupation($i)];
            Occupation::create($occupation);
        }
    }
}
