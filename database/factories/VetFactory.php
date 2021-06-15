<?php

namespace Database\Factories;

use App\Models\Vet;
use Illuminate\Database\Eloquent\Factories\Factory;

class VetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'organization' => $this->faker->company(),
            'address' => $this->faker->address(),
            'phone' => substr($this->faker->phoneNumber(),0,13),
            'other_contact' => substr($this->faker->phoneNumber(),0,13),
            'relative_distance' => $this->faker->time()
        ];
    }
}
