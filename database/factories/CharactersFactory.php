<?php

namespace Database\Factories;

use App\Models\Characters;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharactersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Characters::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'status' => $this->faker->word,
        'species' => $this->faker->word,
        'type' => $this->faker->word,
        'gender' => $this->faker->word,
        'origin_name' => $this->faker->word,
        'origin_url' => $this->faker->word,
        'location_name' => $this->faker->word,
        'location_url' => $this->faker->word,
        'image' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
