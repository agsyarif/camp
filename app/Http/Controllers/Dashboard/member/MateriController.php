<?php

namespace App\Http\Controllers\Dashboard\member;

use App\Models\exam;
use App\Models\course;
use App\Models\question;
use App\Models\CourseLesson;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Session\Session;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tampil($id)
    {

        // data khusus atau data aktif sekarang//
        $MateriActive = CourseMaterial::where('id', '=', $id)->get();
        $ChapterActive = CourseLesson::where('id', '=', $MateriActive[0]->course_lesson_id)->get();
        $CourseActive = course::where('id', '=', $ChapterActive[0]->course_id)->get();

        // semua data //
        $chapter = CourseLesson::where('course_id', '=', $CourseActive[0]->id)->get();
        $chapterId = [];
        foreach ($chapter as $key => $value) {
            $chapterId[] = $value->id;
        }
        $material = CourseMaterial::whereIn('course_lesson_id', $chapterId)->get();
        $active = 'course';
        $exam = exam::where('course_lesson_id', '=', $ChapterActive[0]->id)->get();
        $question = question::where('exam_id', '=', $exam[0]->id)->get();
        $data = [
            'MateriActive' => $MateriActive,
            'ChapterActive' => $ChapterActive,
            'CourseActive' => $CourseActive,
            'chapter' => $chapter,
            'material' => $material,
            'active' => $active,
            'exam' => $exam,
            'question' => $question,
        ];
        // return dd($data);
        return view('pages.Dashboard.member.course.show', compact('MateriActive', 'ChapterActive', 'CourseActive', 'chapter', 'material', 'active', 'exam', 'question'));
    }
}
