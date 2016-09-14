<?php

use Collejo\Core\Database\Seeder;
use Collejo\App\Models\Media;
use Collejo\App\Models\User;
use Collejo\App\Models\Employee;

class EmployeeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(User::class, 20)->create()->each(function($user){
    		$user->employee()->save(factory(Employee::class)->make());
    	});
    }
}
