<?php

use Illuminate\Database\Seeder;
use App\Models\Medical;
class MedicalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 11;$i <= 20;$i++)
        {
            $medical = [
                'user_id' =>  $i,
                'hospital_id' => $i % 10 + 1,
                'occupation_id' => $i % 3 + 1,
                'division_main_id' => $i,
                'division_vice_id' => $i + 3,
                'relationship' => self::relationship($i),
            ]; 
            Medical::create($medical);
        }
    }
    public function relationship($j)
    {
        if($j % 4 == 0)
            return "友好";
        else
            return "合約";
    }

}
