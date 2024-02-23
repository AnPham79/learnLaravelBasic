<?php

namespace Database\Factories;
use App\Models\user;

use Illuminate\Database\Eloquent\Factories\Factory;

class userFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'avatar' => $this->faker->imageUrl($width = 640, $height = 480),
            'level' => $this->faker->boolean(),
            'email' => $this->faker->email(),
            'password' => $this->faker->password(),
            'created_at' => now()
        ];
    }
}
