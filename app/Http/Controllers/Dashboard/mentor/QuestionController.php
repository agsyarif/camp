<?php

namespace App\Http\Controllers\Dashboard\mentor;

use App\Models\exam;
use App\Models\type;
use App\Models\course;
use App\Models\question;
use App\Models\CourseLesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function show($id)
    {

        // $exam = exam::where('id', $id)->get();
        $exam = exam::findOrFail($id);
        $examAll = exam::all();
        $courses = course::all()->count();
        $chapter = CourseLesson::where('course_id', '=', $exam->course_id)->get();
        // return $chapter;
        $type = type::all();
        return view('pages.Dashboard.mentor.question.create', compact('exam', 'type', 'courses', 'examAll', 'chapter'));
        // $examAll = exam::all();
        // $question = question::where('exam_id', $id)->get();
        // $courses = course::all();
        // return view('pages.Dashboard.mentor.question.index', compact('exam', 'examAll', 'question', 'courses'));
    }

    public function store(Request $request)
    {
        $currentExam = $request->Exam_id;

        $question = new question;
        $question->exam_id = $request->Exam_id;
        $question->type_id = $request->type_id;
        $question->title = $request->soal;
        // $question->chapter_id = $request->chapter;
        $question->answer = $request->answer;
        $question->option1 = $request->opsiA;
        $question->option2 = $request->opsiB;
        $question->option3 = $request->opsiC;
        $question->option4 = $request->opsiD;
        $question->explanations = $request->explanation;
        $question->save();

        toast()->success("Add Question Has Been Success");
        return redirect()->route('mentor.exam.show', $currentExam);
    }

    public function edit($id)
    {
        $question = question::findOrFail($id);
        $exam = exam::all();
        $type = type::all();
        $courses = course::all()->count();
        // return $question;
        return view('pages.Dashboard.mentor.question.edit', compact('question', 'exam', 'type', 'courses'));
    }

    public function update(Request $request, $id)
    {
        validator([
            'Exam_id' => 'required',
            'type_id' => 'required',
            'soal' => 'required',
            'answer' => 'required',
            'opsiA' => 'required',
            'opsiB' => 'required',
            'opsiC' => 'required',
            'opsiD' => 'required',
            'explanation' => 'required',
        ]);

        // if($request->type_id == null)[

        // ]

        $question = question::findOrFail($id);
        $question->exam_id = $request->Exam_id;
        $question->type_id = $request->type_id;
        $question->title = $request->soal;
        $question->answer = $request->answer;
        $question->option1 = $request->opsiA;
        $question->option2 = $request->opsiB;
        $question->option3 = $request->opsiC;
        $question->option4 = $request->opsiD;
        $question->explanations = $request->explanation;
        $question->save();

        // return $request->all();

        // $question = question::findOrFail($id);
        // $question->exam_id = $request->Exam_id;
        // $question->type_id = $request->type_id;

        toast()->success("Update Question Has Been Success");
        return redirect()->route('mentor.exam.show', $question->exam_id);
    }

    public function destroy($id)
    {
        $question = question::findOrFail($id);
        $question->delete();
        toast()->success("Delete Question Has Been Success");
        return redirect()->route('mentor.exam.show', $question->exam_id);
    }
}
