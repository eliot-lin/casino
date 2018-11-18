<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(VIPsTableSeeder::class);
        $this->call(MissionsTableSeeder::class);
        $this->call(HospitalsTableSeeder::class);
        $this->call(DivisionTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MedicalsTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(OccupationsTableSeeder::class);
        $this->call(WorktimesTableSeeder::class);
        $this->call(CitysTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(ServiceTypeTableSeeder::class);
        $this->call(ProgressesTableSeeder::class);
        
    }
}
