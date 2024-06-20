<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Courses;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CoursesTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Courses::class)
            ->assertStatus(200);
    }
}
