<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemberTagFactory extends Factory
{
    protected $model = \App\Models\MemberTag::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}