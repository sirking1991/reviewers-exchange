<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for each course, create 1 to 20 chapters
        \App\Models\Course::all()->each(function ($course) {
            $chapterCount = rand(1, 20);
            for ($i = 0; $i < $chapterCount; $i++) {
                \App\Models\Chapter::factory()->create(['course_id' => $course->id]);
            }
        });
    }
}
