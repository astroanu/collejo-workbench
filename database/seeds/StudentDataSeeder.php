<?php

use Collejo\Core\Database\Seeder;
use Collejo\App\Models\User;
use Collejo\App\Models\Media;
use Collejo\App\Models\Student;
use Collejo\App\Models\Guardian;

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

            $student = factory(Student::class)->make();
    		$user->student()->save($student);

            $guardian = factory(Guardian::class)->make();
            factory(User::class)->create()->guardian()->save($guardian);

            $student->guardians()->sync($this->createPrivotIds([$guardian->id]));
    	});
    }
}
