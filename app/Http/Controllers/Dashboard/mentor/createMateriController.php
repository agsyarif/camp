<?php

namespace App\Http\Controllers\Dashboard\mentor;

use App\Models\course;
use App\Models\CourseLesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\exam;

class createMateriController extends Controller
{
    public function show($id)
    {
        $exam = exam::all();
        $chapter = CourseLesson::find($id);
        $chapterAll = CourseLesson::all();
        $course = course::all();
        $courses = $course->count();
        // return $chapterAll;
        return view('pages.Dashboard.mentor.materi.create', compact('chapter', 'courses', 'chapterAll', 'exam', 'course'));
    }
}
