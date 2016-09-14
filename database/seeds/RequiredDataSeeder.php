<?php

use Collejo\Core\Database\Seeder;
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
        $years = array_fill(0, 15, null);

        foreach ($years as $k => $v) {
            $years[$k] = $this->faker->dateTimeBetween('-10 years', 'now');;
        }

        // create 12 grades
        foreach (range(1, 12) as $num) {
            factory(Grade::class)->create(['name' => 'Grade ' . $num]);

            foreach (range(1, 5) as $class) {
                factory(Clasis::class)->create(['name' => $num . '-' . $class]);
            }
        }

        // create batches
        foreach ($years as $y) {
            
            factory(Batch::class)->create(['name' => $this->course() . ' - ' . $y->format('Y') . ' Batch'])->each(function($batch) use ($y){

                $batch->grades()->sync($this->createPrivotIds($this->faker->randomElements(Grade::all()->lists('id')->all(), 5)));

                $batch->terms()->save(factory(Term::class)->make([
                        'name' => $this->faker->randomElement(['Winter', 'Summer', 'Fall'])
                    ]));
            });
        }

        // create student categories
        foreach ([
                'Transfered',
                'Economy',
                'Foreign',
                'Special Education'
            ] as $category) {
            
            factory(StudentCategory::class)->create([
                    'name' => $category, 
                    'code' => substr(strtoupper($category), 0, 3)
                ]);
        }

        // create employee categories
        foreach ([
                'Transfered Tutors' => [
                    'Senior Tutor',
                    'Junior Tutor',
                    'Assistant Tutor'
                ],
                'Intern Tutors' => [
                    'Temporary Tutor',
                    'Permanant Tutor'
                ],
                'Foreign Lecturers' => [
                    'Senior Lecturer',
                    'Junir Lecturer',
                    'Visiting Lecturer'
                ],
                'Security' => [
                    'Senior Security Officer',
                    'Junior Security Officer',
                    'Security Supervisor'
                ],
                'Lab Assistants' => [
                    'Senior Lab Assistant'
                ],
                'Office Staff' => [
                    'Receptionist',
                    'Office Assistant',
                    'Student Counsellor',
                    'Nurse'
                ]
            ] as $category => $positions) {
            
            $categoryObj = factory(EmployeeCategory::class)->create([
                    'name' => $category, 
                    'code' => substr(strtoupper($category), 0, 3)
                ]);

            // create employee positions
            foreach ($positions as $position) {

                factory(EmployeePosition::class)->create([
                        'name' => $position, 
                        'employee_category_id' => $categoryObj->id
                    ]);
            }
        }

        // create employee departments
        foreach ([
                'Higher Studies Department',
                'Vocational Training Department',
                'Languages Department',
                'Arts Department',
                'Accounting Department'
            ] as $department) {

            factory(EmployeeDepartment::class)->create([
                    'name' => $department, 
                    'code' => substr(strtoupper($department), 0, 3)
                ]);
        }

        // create employee grades
        foreach ([
                'Principal',
                'Senior Staff',
                'Junior Staff',
                'Senior Tutor',
                'Junior Tutor',
                'Senior Security',
                'Security',
                'Intern',
            ] as $grade) {

            factory(EmployeeGrade::class)->create([
                    'name' => $grade, 
                    'code' => substr(strtoupper($grade), 0, 3)
                ]);
        }
    }

    private function course()
    {
        return $this->faker->randomElement([
                'International Business',
                'Marketing',
                'Accounting for a Small Business',
                'Geotechnologies',
                'International Law',
                'The Environment and Resource Management',
                'History and Politics',
                'International Languages',
                'Computer Programming',
                'Literature'
            ]);
    }
}
