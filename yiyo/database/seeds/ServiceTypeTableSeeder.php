<?php

use Illuminate\Database\Seeder;
use App\Models\Service_type;
class ServiceTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 1;$i <= 10;$i++)
        {
            $serviceType = [
                'medical_id' => $i,
                'type_id' => ($i % 2) + 1,
            ];
            Service_type::create($serviceType);
        }
    }
}
