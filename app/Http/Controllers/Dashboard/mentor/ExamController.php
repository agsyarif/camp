<?php

namespace App\Http\Controllers\Dashboard\mentor;

use App\Models\exam;
use App\Models\type;
use App\Models\course;
use App\Models\question;
use App\Models\CourseLesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = course::all();
        $courses = $course->count();
        $exam = exam::all();
        $question = question::all();
        // ambil data course yang course_lesson nya sama dengan exam->course_lesson_id
        foreach ($exam as $key => $value) {
            $course_id = CourseLesson::where('id', $value->course_lesson_id)->pluck('course_id');
            $exam[$key]->course = course::where('id', $course_id)->pluck('name');
        }

        // return $exam->;

        // $course_lesson = CourseLesson::where('course_id', $exam->course_lesson_id)->get();
        // return ;

        return view('pages.Dashboard.mentor.exam.index', compact('courses', 'course', 'exam', 'question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = type::all();
        $course = course::all();
        $courses = $course->count();
        $course_lesson = CourseLesson::all();
        $exam = exam::all();
        return view('pages.Dashboard.mentor.exam.create', compact('type', 'courses', 'course_lesson', 'exam', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'title' => 'required',
            'type_id' => 'required',
            'course_id' => 'required',
            'duration' => 'required',
        ]);

        // return $request->all();
        $courses = course::all();
        $currentCourse = $request->course_id;
        $title = $request->title;
        $duration = $request->duration;
        // $tQuestion = $request->total;
        $score = $request->score;

        $exam = new exam;
        $exam->course_lesson_id = $currentCourse;
        $exam->title = $title;
        $exam->duration = $duration;
        // $exam->total_question = $tQuestion;
        $exam->score = $score;
        $exam->save();

        toast()->success("Add Exam Has Been Success");
        return redirect()->route('mentor.exam.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = exam::find($id);
        $examAll = exam::all();
        $question = question::where('exam_id', $id)->get();
        $courses = course::all()->count();
        $type = type::all();
        $chapter = CourseLesson::where('course_id', '=', $exam->course_id)->get();
        // $chapterTitle = $chapter->pluck('title');
        // foreach ($chapter as $ch) {
        //     $chapterTitle .= $ch->title;
        // }
        // return $chapterTitle;
        // return $chapter;
        return view('pages.Dashboard.mentor.question.index', compact('exam', 'examAll', 'question', 'courses', 'type', 'chapter',));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = exam::findOrFail($id);
        // $course = course::where('id', $exam->course_id)->get();
        $course_lesson = CourseLesson::where('id', $exam->course_lesson_id)->get();
        $type = type::where('id', $exam->type_id)->first();
        $courses = course::all()->count();
        $course_lesson_all = CourseLesson::all();
        return view('pages.Dashboard.mentor.exam.edit', compact('exam', 'course_lesson', 'type', 'courses', 'course_lesson_all'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        validator([
            'title' => 'required',
            'type_id' => 'required',
            'course_id' => 'required',
            'duration' => 'required',
        ]);

        $exam = exam::findOrFail($id);
        $exam->course_lesson_id = $request->course_id;
        $exam->title = $request->title;
        $exam->duration = $request->duration;
        $exam->score = $request->score;
        $exam->save();

        toast()->success("Update Exam Has Been Success");
        return redirect()->route('mentor.exam.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $exam = exam::findOrFail($id);
        $exam->delete();
        $question = question::where('exam_id', $id)->get();
        foreach ($question as $key) {
            $key->delete();
        }
        toast()->success("Delete Exam Has Been Success");
        return redirect()->route('mentor.exam.index');
    }
}
