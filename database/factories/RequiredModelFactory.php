<?php

$factory->define(Collejo\App\Models\Media::class, function (Faker\Generator $faker) {
    return [
        'mime' => 'image/jpeg',
        'ext' => 'jpg'
    ];
});

$factory->define(Collejo\App\Models\Grade::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(Collejo\App\Models\Clasis::class, function (Faker\Generator $faker) {
    return [
        'grade_id' => $faker->randomElement(Collejo\App\Models\Grade::all()->lists('id')->toArray()),
        'name' => $faker->name
    ];
});

$factory->define(Collejo\App\Models\Batch::class, function (Faker\Generator $faker) {
    return [
        'name' => 'batch ' . $faker->date
    ];
});

$factory->define(Collejo\App\Models\Term::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'start_date' => $faker->dateTimeThisYear,
        'end_date' => $faker->dateTimeThisYear,
    ];
});

$factory->define(Collejo\App\Models\StudentCategory::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->name,
        'name' => $faker->name
    ];
});

$factory->define(Collejo\App\Models\EmployeeCategory::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->name,
        'name' => $faker->name
    ];
});

$factory->define(Collejo\App\Models\EmployeeDepartment::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->name,
        'name' => $faker->name
    ];
});

$factory->define(Collejo\App\Models\EmployeeGrade::class, function (Faker\Generator $faker) {
    return [
		'name' => $faker->name,
		'code' => $faker->name,
		'priority' => 1,
		'max_sessions_per_day' => 1,
		'max_sessions_per_week' => 3
    ];
});

$factory->define(Collejo\App\Models\EmployeePosition::class, function (Faker\Generator $faker) {
    return [
		'employee_category_id' => $faker->randomElement(Collejo\App\Models\EmployeeCategory::all()->lists('id')->toArray()),
		'name' => $faker->name
    ];
});
