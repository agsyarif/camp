<?php

namespace App\Http\Controllers\Dashboard\member;

use App\Models\exam;
use App\Models\course;
use App\Models\question;
use App\Models\CourseLesson;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    public function start($id)
    {


        // $question = question::findOrFail($id);
        // return $question;
        // $exam = exam::findOrFail($question->exam_id);
        // return $exam;

        $MateriActive = CourseMaterial::where('id', '=', $id)->get();
        $ChapterActive = CourseLesson::where('id', '=', $MateriActive[0]->course_lesson_id)->get();
        $CourseActive = course::where('id', '=', $ChapterActive[0]->course_id)->get();


        $chapter = CourseLesson::where('course_id', '=', $CourseActive[0]->id)->get();
        $chapterId = [];
        foreach ($chapter as $key => $value) {
            $chapterId[] = $value->id;
        }

        $exam = exam::whereIn('id', $chapterId)->get();
        foreach ($exam as $key => $value) {
            $examId[] = $value->id;
        }
        $id = $examId;
        // return $id;
        $question = question::whereIn('exam_id', $examId)->get();

        $material = CourseMaterial::whereIn('course_lesson_id', $chapterId)->get();
        $active = 'course';

        // return $id;
        // return $question;
        return view('pages.Dashboard.member.quiz.start', compact('MateriActive', 'ChapterActive', 'CourseActive', 'chapter', 'material', 'active', 'exam', 'question', 'id'));
    }

    public function result($score, $examId)
    {
        $examActive = exam::findOrFail($examId);
        $chapterActive = CourseLesson::findOrFail($examActive->course_lesson_id);
        $chapter = CourseLesson::where('course_id', '=', $chapterActive->course_id)->get();
        $chapterId = [];
        foreach ($chapter as $key => $value) {
            $chapterId[] = $value->id;
        }
        $exam = exam::whereIn('id', $chapterId)->get();
        // foreach ($exam as $key => $value) {
        //     $examId[] = $value->id;
        // }
        // $id = $examId;
        // // return $id;
        // $question = question::whereIn('exam_id', $examId)->get();
        $material = CourseMaterial::whereIn('course_lesson_id', $chapterId)->get();
        $active = 'course';

        // return $exam;
        // $chapter = CourseLesson::where('course_id', '=', $chapterActive->course_id);
        // return ;
        return view('pages.Dashboard.member.quiz.result', compact('examActive', 'score', 'chapterActive', 'chapter', 'material', 'exam'));
    }
}
