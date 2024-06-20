<?php

namespace Database\Seeders;

use App\Enums\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for each authors, create 1 to 10 courses
        \App\Models\User::where('type', UserType::AUTHOR)
            ->get()
            ->each(function ($author) {
                \App\Models\Course::factory()
                    ->count(rand(1, 10))
                    ->create(['author_id' => $author->id]);
            });
    }
}
