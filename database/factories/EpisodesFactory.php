<?php

namespace Database\Factories;

use App\Models\Episodes;
use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Episodes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serie_id' => $this->faker->randomDigitNotNull,
        'name' => $this->faker->word,
        'air_date' => $this->faker->word,
        'episode' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
