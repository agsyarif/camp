<?php

namespace App\Http\Controllers\Dashboard\mentor;

use App\Models\course;
use App\Models\CourseLesson;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;
use App\Http\Controllers\Controller;

class priviewController extends Controller
{
    public function show($id){
        $materi = CourseMaterial::where('id', $id)->first();
        $chapter = CourseLesson::where('id' ,$materi->course_lesson_id)->first();
        // return $chapter->title;
        $courseid = CourseLesson::where('id' ,$materi->course_lesson_id)->first()->course_id;
        $courses = course::all();
        // return $courseid;

        return view('pages.Dashboard.mentor.materi.priview', compact('materi', 'chapter', 'courses', 'courseid'));
    }
}
