<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create(['type'=>'author']);
        User::factory(100)->create(['type'=>'reviewer']);

        User::factory()->create([
            'first_name' => 'Sherwin',
            'last_name' => 'de Jesus',
            'email' => 'sirking1991@gmail.com',
            'type' => 'admin'
        ]);

        $this->call(CourseSeeder::class);
        $this->call(ChapterSeeder::class);
        $this->call(PageSeeder::class);
    }
}
