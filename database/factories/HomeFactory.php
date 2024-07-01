<?php

namespace Database\Factories;

use App\Models\Styleinterior;
use App\Models\Color;
use App\Models\Location;
use App\Models\User;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Home>
 */
class HomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $location = Location::inRandomOrder()->first();
        $styleinterior = Styleinterior::with('style')->inRandomOrder()->first();
        $year = Year::inRandomOrder()->first();
        $color = Color::inRandomOrder()->first();
        $createdAt = fake()->dateTimeBetween('-6 months', 'now');
        return [
            'user_id' => $user->id,
            'location_id' => $location->id,
            'style_id' => $styleinterior->style_id,
            'styleinterior_id' => $styleinterior->id,
            'year_id' => $year->id,
            'color_id' => $color->id,
            'title' => $year->name . ' ' . $color->name . ' ' . $styleinterior->style->name . ' ' . $styleinterior->name,
            'body' => fake()->paragraph(rand(1, 3)),
            'price' => fake()->numberBetween(100, 500) * 1000,
            'credit' => fake()->boolean(10),
            'exchange' => fake()->boolean(30),
            'created_at' => Carbon::parse($createdAt),
            'updated_at' => Carbon::parse($createdAt)->addDays(rand(0, 6))->addHours(rand(0, 23))->addMinutes(rand(0, 59)),
        ];
    }
}
