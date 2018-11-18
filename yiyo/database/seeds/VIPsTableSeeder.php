<?php

use Illuminate\Database\Seeder;
use App\Models\VIP;
class VIPsTableSeeder extends Seeder
{

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
    public function bloodType($data)
    {
        switch($data)
        {
            case 0:
                return "A型";
            case 1:
                return "B型";
            case 2:
                return "O型";
            case 3:
                return "AB型";
        }
    }
    public function religion($data)
    {
        switch($data)
        {
            case 0:
                return "佛教";
            case 1:
                return "道教";
            case 2:
                return "基督教";
            case 3:
                return "伊斯蘭教";
        }
    }
    public function contactRelation($data)
    {
        switch($data)
        {
            case 0:
                return "父子";
            case 1:
                return "兄弟";
            case 2:
                return "母子";
            case 3:
                return "兄妹";
        }
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $name = array("劉珠珠", "賴珠珠", "王小明", "李大奔", "李小柔", "陳小華", "郭太明", "王永清", "魏英充", "蔡國文", "馬英十", "陳乾扁");
       for($i = 1;$i <= 10; $i++) 
        {
            $vip = [
                'group_id' => $i,
                'user_id' => $i,
                'card_no' => self::characterreturn($i%3) .'000'.(string)(rand(0,9) ). '-' .'000'.(string)(rand(0,9)) .'',
                
                'occupation' => '上班族',
                'height' => ''. 170 + $i . '',
                'weight' => ''. 60 + $i . '',
                'blood_type' => self::bloodType($i % 4),
                'religion' => self::religion($i % 4),
                'address_visit' => '台北市大安區基隆路' . $i .'段',
                'contact' => $name[$i],
                'contact_relationship' => self::contactRelation($i % 4),
                'contact_phone' => '0'.(string)('9123'. 456 + $i . '789').'',
                'contact_address' => '台北市大安區基隆路' . $i .'段'
            ];
            VIP::create($vip);
        }

        $vip = [
            'group_id' => $i,
            'user_id' => $i,
            'card_no' => 'C000'.(string)(rand(0,9) ). '-' .'000'.(string)(rand(0,9)) .'(元又)',
            'occupation' => '工程師',
            'height' => ''. 170 + $i . '',
            'weight' => ''. 60 + $i . '',
            'blood_type' => self::bloodType($i % 4),
            'religion' => '基督教',
            'address_visit' => '台北市泰山區' . $i .'段',
            'contact' => $name[$i],
            'contact_relationship' => '無',
            'contact_phone' => '0987-098-744',
            'contact_address' => '台北市大安區基隆路' . $i .'段'
        ];
        VIP::create($vip);
    }

   
}
