<?php

use Illuminate\Database\Seeder;
use App\Models\Group;
class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 0;$i <10;$i++)
        {
            $groupname = array("賴家", "林家", "周家", "台積電", "聯發科", "中華電", "鴻海", "宏達電", "華碩", "宏碁");
            $group = [
              'level_id' => $i % 3 + 1,
              'sales_id' => $i,
              'name' => $groupname[$i],
              'type' => $i % 2,
              'count' => $i + rand(4,100) 
            ];
            Group::create($group);
        }
    }
}
