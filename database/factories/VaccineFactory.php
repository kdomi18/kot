<?php

namespace Database\Factories;

use App\Models\Vaccine;
use Illuminate\Database\Eloquent\Factories\Factory;

class VaccineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vaccine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vet_id' => $this->faker->numberBetween(1, 20),
            'medication' => $this->faker->shuffle('bfjwbejkf'),
            'date' => $this->faker->dateTime(),
            'next_date' => $this->faker->dateTime(),
            'price'=> $this->faker->randomFloat(2,0,100000),
            'notes' => $this->faker->sentence()
        ];
    }
}
