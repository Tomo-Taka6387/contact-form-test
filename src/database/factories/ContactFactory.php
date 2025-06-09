<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * 
     */
    public function definition()
    {
        return [
           'last_name' => $this->faker->lastName(),
           'first_name' => $this->faker->firstName(),
            'gender' => $this->faker->numberBetween(1,3),
            'tel1' => $this->faker->numberBetween(100,900),
            'tel2' => $this->faker->numberBetween(1000,9999),
            'tel3' => $this->faker->numberBetween(1000,9999),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'building' => $this->faker->optional()->secondaryAddress(),
            'category_id' => $this->faker->numberBetween(1,5),
            'detail' => $this->faker->realText(120)
        ];
    }
}
