<?php

$factory->define(Collejo\App\Models\Address::class, function (Faker\Generator $faker) {
    return [
        'full_name' => $faker->name,
        'user_id' => $faker->name,
        'address' => $faker->address,
        'city' => $faker->city,
        'postal_code' => $faker->zip,
        'phone' => $faker->phone
    ];
});

$factory->define(Collejo\App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->safeEmail,
        'password' => Hash::make(123),
        'remember_token' => null,
        'date_of_birth' => $faker->dateTimeThisDecade,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName
    ];
});

$factory->define(Collejo\App\Models\Student::class, function (Faker\Generator $faker) {
    return [
        'admission_number' => 'S-' . $faker->randomNumber(8),
        'admitted_on' => $faker->dateTimeThisDecade,
        'student_category_id' => $faker->randomElement(Collejo\App\Models\StudentCategory::all()->lists('id')->all()),
        //'image_id' => $faker->randomElement(Collejo\App\Models\Media::all()->lists('id')->all())
    ];
});

$factory->define(Collejo\App\Models\Employee::class, function (Faker\Generator $faker) {
    return [
        'employee_number' => 'E-' . $faker->randomNumber(8),
        'joined_on' => $faker->dateTimeThisDecade,
        'employee_position_id' => $faker->randomElement(Collejo\App\Models\EmployeePosition::all()->lists('id')->all()),
        'employee_department_id' => $faker->randomElement(Collejo\App\Models\EmployeeDepartment::all()->lists('id')->all()),
        'employee_grade_id' => $faker->randomElement(Collejo\App\Models\EmployeeGrade::all()->lists('id')->all())
    ];
});
