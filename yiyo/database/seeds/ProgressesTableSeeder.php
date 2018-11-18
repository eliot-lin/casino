<?php

use Illuminate\Database\Seeder;
use App\Models\Progress;

class ProgressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = array("處理中", "聊天室", "等待中", "完成", "轉接專人處理中");
        $color = array("#DC143C", "#008000", "#778899", "#4169E1");
        //
        // for($i = 1; $i <=50; $i++)
        // {
        //     $progress = [
        //        'mission_id' => $i%10,
        //        'color' => $color[$i%4],
        //        'content' => $content[$i%5],
        //        'issued_at' => strtotime('now'),
        //     ];
        //     Progress::create($progress);
        // }
    }
}
