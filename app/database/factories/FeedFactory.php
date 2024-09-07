<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use function Symfony\Component\Translation\t;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class FeedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::query()->inRandomOrder()->value('id'),
            'text' => fake()->words(5, true),
            'content' => fake()->imageUrl(360, 360, 'animals', true, 'dogs', true, 'jpg'),
            'price' => random_int(1,3) !== 1 ? random_int(1,50) : null,
        ];
    }

}
