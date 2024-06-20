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
            <div class="bg-white shadow-md rounded p-4 mb-4">
                <label for="voice-search" class="sr-only">Search</label>
                <div class="flex items-center mb-4">
                    <input 
                        type="text" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" 
                        placeholder="Search courses..." 
                        wire:model.live.debounce='search'
                    />
                    <button class="ms-2 bg-white text-black p-2.5 rounded-lg border border-solid border-black shadow-md hover:shadow-lg transition duration-300 ease-in-out">New Course</button>
                </div>
            </div>

            <!-- Course List -->
            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($courses as $course)
                <li class="bg-white shadow-md rounded p-4">
                <a href="{{ route('course', $course->id) }}">
                    <div class="flex justify-center">
                        <img src="https://picsum.photos/200/200.webp?random=1" alt="{{ $course->title }}" class="w-24 h-24 object-cover rounded">
                    </div>
                    <h3 class="text-lg font-bold mt-2">
                            {{ $course->title }}
                    </h3>
                </a>
                <p class="text-gray-600 italic">{{ Str::words($course->description, 10) }}</p>
                </li>
                @endforeach
            </ul>
        </div>
        HTML;
    }
}
