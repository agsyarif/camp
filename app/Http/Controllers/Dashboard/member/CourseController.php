<?php

namespace App\Http\Controllers\Dashboard\member;

use App\Http\Controllers\Controller;
use App\Models\akses_course;
use App\Models\checkout_course;
use App\Models\course;
use App\Models\CourseLesson;
use App\Models\CourseMaterial;
use App\Models\exam;
use App\Models\question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akses = Auth::user()->user_role_id;
        $aksesCourse = akses_course::where('user_id', '=', Auth::user()->id)->get();
        // return $aksesCourse;
        $id_course = [];
        foreach ($aksesCourse as $key => $value) {
            $id_course[] = $value->course_id;
        }
        $course = course::whereIn('id', $id_course)->get();
        // return $course;
        $active = 'course';
        $courses = count($course);

        return view('pages.Dashboard.member.course.index', compact('course', 'active', 'courses'));

        // $courses = Course::where('user_id', '=', Auth::user()->id)->get();
        // $courses = course::where('id', '=', [$aksesCourse->course_id])->get();
        // return $course;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courses = course::find($id);
        $chapter = CourseLesson::where('course_id', '=', $id)->get();

        // $exam = exam::where('course_lesson_id', '=', $id)->get();
        // $exam = exam::
        // $question = question::where('exam_id', '=', $exam[0]->id)->get();
        // return $question;
        // $exam = exam::where('id', 1)->get();


        // return $question->count();

        $chapterId = [];
        foreach ($chapter as $key => $value) {
            $chapterId[] = $value->id;
        }
        $exam = exam::whereIn('course_lesson_id', $chapterId)->get();

        foreach ($exam as $key => $value) {
            $examId[] = $value->id;
        }
        $question = question::whereIn('exam_id', $examId)->get();
        $material = CourseMaterial::whereIn('course_lesson_id', $chapterId)->get();
        $active = 'course';
        $MateriActive[] = $material[0];
        $ChapterActive[] = $chapter[0];

        // return redirect()->route('member.course.materi', [$id, $activeId]);
        return view('pages.Dashboard.member.course.show', compact('courses', 'chapter', 'material', 'active', 'MateriActive', 'ChapterActive', 'exam', 'question'));
        // return redirect()->route('member.course.materi', [$MateriActive[0]->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return $id;
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
        return "update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function materi()
    {
    }
}
