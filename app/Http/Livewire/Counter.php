<?php

namespace App\Http\Livewire;

use App\Models\akses_course;
use App\Models\course;
use App\Models\CourseCategory;
use App\Models\question;
use Livewire\Component;
use Livewire\WithPagination;

class Counter extends Component
{

    use WithPagination;

    // mmebuat livewire chart untuk progress belajar user
    public $category = [];
    public $user_id = '';
    public $progress = [];

    // public $progress_id = [];

    public function mount($id)
    {
        $this->user_id = $id;
        $course = akses_course::where('user_id', $id)->get();
        $course_id = [];
        foreach ($course as $key => $value) {
            $course_id = $value->course_id;
        }
        $cc = course::findOrFail($course_id);
        $category = CourseCategory::findOrFail($cc->course_category_id);
        $this->category = $category->name;
    }

    public function progress()
    {
        $user_id = $this->user_id;
        // $ca = akses_course::where('user_id', $user_id)->get();
        // $course_id = [];
        // foreach ($ca as $key => $value) {
        //     $course_id[] = $value->course_id;
        // }
        // $course = course::whereIn('id', $course_id)->get();
        // $category_id = [];
        // foreach ($course as $key => $value) {
        //     $category_id[] = $value->course_category_id;
        // }
        // $category = CourseCategory::whereIn('id', $category_id)->get();
        // $this->category = $category;
        // $category = array_unique($category_id);
        // foreach ($category as $key => $value) {
        //     $this->category[] = $value;
        // }
        // foreach ($this->category as $key => $value) {
        //     $progress = akses_course::where('user_id', $user_id)->where('category', $value)->get();
        //     $this->progress[] = count($progress);
        // }
        // return $this->category;

        // $category = CourseCategory::whereIn('course_id', $course_id)->get();
        // foreach ($category as $key => $value) {
        //     $this->category[] = $value->category_id;
        // }
        // return $this->category;
    }


    // public $question_id;
    // public $color = '';
    // protected $paginationTheme = 'bootstrap';
    // public $selectedAnswer = [];
    // public $jawaban = [];
    // public $score;
    // public $bobot;

    // function for data $selected

    // public function answers($questionId, $option)
    // {

    //     $this->jawaban[$questionId] =  $questionId . '-' . $option;
    // }

    // public function submitAnswer()
    // {
    //     if (count($this->jawaban) > 0) {
    //         foreach ($this->jawaban as $key => $value) {
    //             $this->selectedAnswer[] = $value;
    //             // mencocokan jawaban dengan database
    //             $questionanswer = question::findOrFail($key)->answer;
    //             // $answer = $question->answer;
    //             // $answer = $question->answer;
    //             $userAnswer = substr($value, strpos($value, '-') + 1);

    //             $total = question::where('id', $key)->get();
    //             $tot = $total[0]->exam_id;
    //             $tt = question::where('exam_id', $tot)->get()->count();
    //             $bobot = 100 / $tt;
    //             $score = $this->score;
    //             $q = 0;
    //             if ($userAnswer == $questionanswer) {
    //                 $this->score = $score + $bobot;
    //                 // $this->color = 'green';
    //             }
    //             // } else {
    //             //     $this->color = 'red';
    //             // }
    //         }
    //     }
    // }




    public function render()
    {
        return view('livewire.counter', [
            // soal use pagination
            'category' => $this->category,
            // 'questions' => question::paginate(1),
            // 'answers' => $this->answers,
        ]);
    }
}
