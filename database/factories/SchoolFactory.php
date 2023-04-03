<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    protected $school=School::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'school_name'=>$this->faker->name,
            'address'=>$this->faker->address,
            'headmaster'=>$this->faker->name,
            'gender'=>$this->faker->randomElement(['Male', 'Female']),
            'phone_number'=>$this->faker->unique()->phoneNumber,
            'email'=>$this->faker->unique()->safeEmail(),
            'description'=>$this->faker->paragraph(),
        ];
    }
}

