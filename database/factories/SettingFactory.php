<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'site_title' => $this->faker->name(),
            'home_description' => $this->faker->text(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'email' => $this->faker->email(),
            'social_media' => [
                'instagram' => $this->faker->url(),
                'twitter' => $this->faker->url(),
                'linkedin' => $this->faker->url(),
                'GitHub' => $this->faker->url(),
            ],
            'about_experience' => [
                'icon' => $this->faker->word(),
                'history' => $this->faker->year(),
                'title' => $this->faker->name(),
                'company' => $this->faker->name()
            ],
            'about_education' =>[
               'icon' => $this->faker->word(),
               'history' => $this->faker->year(),
               'degree' => $this->faker->jobTitle(),
               'university' => $this->faker->name()
            ],
            'footer_title' => $this->faker->sentence(15),
            'footer_description' => $this->faker->sentence(23)
        ];
    }
}