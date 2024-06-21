<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class Courses extends Component
{

    public $courses = [];
    public $search = '';

    public function render()
    {
        $this->courses = Course::where('author_id', auth()->user()->id)
            ->when(!empty($this->search), fn($q)=>$q->where('title', 'like', '%'.$this->search.'%'))
            ->get();

        return <<<'HTML'
        <div>
            
            <div class="flex items-center mt-4 mb-4">
                <div class="row w-100">
                    <div class="col-8">
                        <button class='btn btn-secondary'><i class="bi bi-plus"></i> Create new course</button>
                    </div>
                    <div class="col-4">
                        <input 
                            type="text" 
                            class="form-control w-full" 
                            placeholder="Search" 
                            wire:model.live.debounce='search'
                        />                    
                    </div>
                </div>
            </div>

            <!-- Course List -->
            
                <div class="row gx-4 gy-4">
                @foreach($courses as $course)
                <div class="col-md-4 mb-2">
                    <div class="card border shadow mb-4 h-100">
                        <img src="https://picsum.photos/200/150.webp" class="card-img-top" alt="{{ $course->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ Str::words($course->description, 10) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            
        </div>
        HTML;
    }
}
