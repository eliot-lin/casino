<?php

use Illuminate\Database\Seeder;
use App\Models\Status;
class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function status($data)
    {
        switch($data)
        {
            case 1:
                return "未執行";
            case 2:
                return "執行中";
            case 3:
                return "完成";
            case 4:
                return "失敗";
            case 5:
                return "委託中";
            case 6:
                return "等待中";
        }
    }
    public function run()
    {
        //
        for($i = 1;$i <= 6;$i++)
        {
            $status = ['name' => self::status($i)];
            Status::create($status);
        }
    }
}
