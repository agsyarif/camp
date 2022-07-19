<?php

namespace App\Http\Livewire;

use App\Models\CourseLesson;
use App\Models\exam;
use Livewire\Component;

class CourseChapter extends Component
{
    public $course_id;
    public $chapter_id;
    public $course = [];
    public $title;
    public $duration;

    public function mount($course)
    {
        $this->course = $course;
        return $this->course;
    }

    public function selectCourse($course_id)
    {
        $this->course_id = $course_id;
    }

    public function selectChapter($chapter_id)
    {
        $this->chapter_id = $chapter_id;
    }

    public function submit()
    {

        $submit = new exam;
        $submit->course_lesson_id = $this->chapter_id;
        $submit->title = $this->title;
        $submit->duration = $this->duration;
        $submit->score = 0;
        $submit->save();

        return redirect()->route('mentor.exam.index');
    }

    public function render()
    {
        return view('livewire.course-chapter', [
            'course' => $this->course,
            'chapter' => CourseLesson::where('course_id', $this->course_id)->get()
        ]);
    }
}
