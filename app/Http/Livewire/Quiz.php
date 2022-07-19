<?php

namespace App\Http\Livewire;

use App\Models\exam;
use App\Models\question;
use Livewire\Component;
use Livewire\WithPagination;

class Quiz extends Component
{
    use WithPagination;

    public $exam_id;
    public $question_id;
    // protected $paginationTheme = 'tailwind';
    public $selectedAnswer = [];
    public $jawaban = [];
    public $score;

    public function mount($id)
    {
        $this->exam_id = $id;
    }

    public function answers($questionId, $option)
    {
        $this->jawaban[$questionId] =  $questionId . '-' . $option;
    }

    public function submitAnswer()
    {
        if (count($this->jawaban) > 0) {
            foreach ($this->jawaban as $key => $value) {
                $this->selectedAnswer[] = $value;
                // mencocokan jawaban dengan database
                $questionanswer = question::findOrFail($key)->answer;

                $userAnswer = substr($value, strpos($value, '-') + 1);
                $total = question::where('id', $key)->get();
                $tot = $total[0]->exam_id;
                $tt = question::where('exam_id', $tot)->count();
                $bobot = 100 / $tt;
                $score = $this->score;
                if ($userAnswer == $questionanswer) {
                    $this->score = $score + $bobot;
                }
            }
        } else {
            $this->score = 0;
        }

        $update = exam::findOrFail($this->exam_id[0]);
        $update->score = $this->score;
        $update->save();

        return redirect()->route('member.quiz.result', [$this->score, $this->exam_id[0]]);
    }


    // public function customPagination()
    // {

    //     return 'custom-pagination';
    // }

    public function render()
    {
        return view('livewire.quiz', [
            // soal use pagination
            'questions' => question::paginate(1),
            'exam' => exam::findOrFail($this->exam_id)
            // 'answers' => $this->answers,
        ]);
    }

    // public function paginationView()
    // {

    //     return 'custom-pagination';
    // }
}
