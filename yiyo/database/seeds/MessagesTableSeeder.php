<?php

use Illuminate\Database\Seeder;
use App\Models\Message;
class MessagesTableSeeder extends Seeder
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
            $message = ['mission_id' => $i, 
            'from_id' => $i,
            'to_id'=>$i%3,
            'created_at' => strtotime('now'), 
            'source_type' => $i % 3, 
            'source' => '這是message內容'];
            Message::create($message);
        }
    }
}
