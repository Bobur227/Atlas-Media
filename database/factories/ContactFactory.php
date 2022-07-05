<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "email" => $this->faker->email(),
            "submit" => $this->faker->text(50),
            "message" => $this->faker->text(50),
            "file" => Storage::url(
                'posts/' . $this->faker->file(storage_path('app/public/contact')),
            )
        ];
    }
}
