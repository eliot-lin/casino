<?php

use Illuminate\Database\Seeder;
use App\Models\Mission;

class MissionsTableSeeder extends Seeder
{
    public function randomCorrespondent($i)
    {
        switch($i%2)   {
            case 0:
                return 'NP';
            case 1:
                return 'Doc';
        }

    }
    public function characterreturn($data)
    {
        switch($data)   {
            case 0:
                return 'S';
            case 1:
                return 'F';
            case 2:
                return 'C';
        }    
    }
    public function missionType($data)
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
        }
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <=10; $i++)
        {
            $ccname = array("周節倫", "蔡一琳", "吳中線", "徐真");
            $vipname = array("劉珠珠", "賴珠珠", "王小明", "李大奔", "李小柔", "陳小華", "郭太明", "王永清", "魏英充", "蔡國文", "馬英十", "陳乾扁");
            $groupname = array("台積電", "聯發科", "中華電", "鴻海", "宏達電");
            $mission = [
               'requester_id' => $i,
               'provider_id' => $i + 20,
               'type_id' => $i % 4 + 1,
               'status_id' => 1,
               'method' => $i % 3,
               'group_name' => $groupname[$i % 5],
               'vip_card_no' => self::characterreturn($i%3) .'000'.(string)(rand(0,9) ). '-' .'000'.(string)(rand(0,9)) .'',
               'type_name' => self::missionType($i % 4 + 1),
               'requester_name'=> $vipname[$i],
               'provider_name' => $ccname[$i % 4],
               'status_name' => '未執行',
               'description' => '這是問診或掛號訊息',
               'suggestion' => '這是醫師建議訊息'
            ];
            Mission::create($mission);
        }
    }
}
