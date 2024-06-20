<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for each chapter, create 1 to 20 page
        \App\Models\Chapter::all()->each(function ($chapter) {
            $count = rand(1, 20);
            for ($i = 0; $i < $count; $i++) {
                \App\Models\Page::factory()->create(['chapter_id' => $chapter->id]);
            }
        });
    }
}
