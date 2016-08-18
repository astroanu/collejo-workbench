<?php

use Illuminate\Database\Seeder;
use Collejo\App\Models\Grade;
use Collejo\App\Models\Clasis;
use Collejo\App\Models\Batch;
use Collejo\App\Models\Term;
use Collejo\App\Models\EmployeeCategory;
use Collejo\App\Models\EmployeePosition;
use Collejo\App\Models\EmployeeDepartment;
use Collejo\App\Models\EmployeeGrade;
use Collejo\App\Models\StudentCategory;

class RequiredDataSeeder extends Seeder
{
    public function run()
    {
    	factory(Grade::class, 15)->create();

    	factory(Clasis::class, 120)->create();
    	
    	factory(StudentCategory::class, 12)->create();

    	factory(EmployeeCategory::class, 10)->create()->each(function($category){
    		$category->employeePositions()->save(factory(EmployeePosition::class)->make());
    	});

    	factory(EmployeeDepartment::class, 12)->create();

    	factory(EmployeeGrade::class, 10)->create();

    	factory(Batch::class, 10)->create()->each(function($batch){
    		$batch->grades()->sync($this->createPrivotIds(Grade::all()->lists('id')));

    		$batch->terms()->save(factory(Term::class)->make());
    	});
    }

    public function createPrivotIds($collection)
	{
		$ids = $collection->map(function(){
			return ['id' => (string) Uuid::generate(4)];
		});

		return array_combine(array_values($collection->toArray()), $ids->all());
	}
}
