<?php

use Illuminate\Database\Seeder;
use Collejo\App\Models\User;
use Collejo\App\Models\Media;
use Collejo\App\Models\Student;

class StudentDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(User::class, 20)->create()->each(function($user){
    		$user->student()->save(factory(Student::class)->make());
    	});
    }
}
