<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupportFactory extends Factory
{
    protected $model = Support::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => '23bdd206-8ef4-4444-ab20-34edd9bc7b95',
            'lesson_id' => '03c8b657-bd8d-487e-8036-1f71df481418',
            'status' => 'P',
            'description' => $this->faker->sentence(30),
        ];
    }
}
