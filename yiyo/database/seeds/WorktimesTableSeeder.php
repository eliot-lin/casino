<?php

use Illuminate\Database\Seeder;
use App\Models\WorkTime;
class WorktimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 1;$i<=10;$i++)
        {
            $worktime = [
                'medical_id' => $i,
                'date' => (int)'20'.rand(17,17).str_pad(rand(10,10), 2 ,'0', STR_PAD_LEFT).str_pad(rand(20,28), 2 , '0' , STR_PAD_LEFT).'',
                'period' => $i % 3
            ];
            WorkTime::create($worktime);
        }
    }
}
