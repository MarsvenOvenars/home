<?php

namespace Database\Seeders;

use App\Models\Style;
use App\Models\Styleinterior;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StyleinteriorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            ['name' => 'Modern', 'interiors' => [
                'modern', 'Scandinavian', 'Mediterranean', 'Futurism', 'High tech',
            ]],
            ['name' => 'Raitovsky', 'interiors' => [
                'Hygge', 'Shabby chic',
            ]],
            ['name' => 'Minimalism', 'interiors' => [
                'Japanese', 'loft', 'Pop Art', 'classicism',
            ]],
            ['name' => 'European', 'interiors' => [
                'art deco', 'ethno',
            ]],
        ];

        foreach ($objs as $obj) {
            $style = Style::create([
                'name' => $obj['name'],
            ]);

            foreach ($obj['interiors'] as $interior) {
                Styleinterior::create([
                    'style_id' => $style->id,
                    'name' => $interior,
                ]);
            }
        }
    }
}
