<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CourseTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Course::class)
            ->assertStatus(200);
    }
}
