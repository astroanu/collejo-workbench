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
        $this->call(RequiredDataSeeder::class);
        $this->call(ClasisDataSeeder::class);
        $this->call(StudentDataSeeder::class);
    }
}
