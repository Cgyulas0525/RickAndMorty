<?php

namespace Database\Factories;

use App\Models\Episodecharacters;
use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodecharactersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Episodecharacters::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'episode_id' => $this->faker->randomDigitNotNull,
        'character_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
