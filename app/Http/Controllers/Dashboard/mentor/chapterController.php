<?php

namespace App\Http\Controllers\Dashboard\mentor;

use App\Models\course;
use App\Models\CourseLesson;
use Illuminate\Http\Request;
use App\Models\CourseMaterial;
use App\Http\Controllers\Controller;
use App\Models\exam;

class chapterController extends Controller
{
    public function edit($id)
    {

        // return $id;
        $exam = exam::all();
        $chapter = CourseLesson::find($id);
        $courses = course::all();
        return view('pages.Dashboard.mentor.chapter.edit', compact('id', 'chapter', 'courses', 'exam'));
    }

    public function update(Request $request, $id)
    {
        $newChapter = $request;
        $course_id = CourseLesson::find($id)->course_id;

        $chapter = CourseLesson::find($id);
        $chapter->title = $newChapter->title;
        $chapter->save();
        toast('Chapter Updated Successfully', 'success');
        return redirect()->route('mentor.materi.show', $course_id);
    }

    public function store(Request $request)
    {
        $chapter = $request->title;
        $courseId = $request->course_id;
        // return count($chapter);

        for ($i = 0; $i < count($chapter); $i++) {

            $isi = new CourseLesson;
            $isi->title = $chapter[$i];
            $isi->course_id = $courseId;
            $isi->save();
        }

        toast()->success("Add Chapter Has Been Success");
        return redirect()->route('mentor.materi.show', $courseId);
    }

    // fungtion untuk mnambahkan data materi => karena harsu pake id si chapter.
    public function show($id)
    {

        $exam = exam::all();
        $courses = course::find($id);
        $chapter = CourseLesson::where('course_id', '=', $id)->get();
        return view('pages.Dashboard.mentor.chapter.create', compact('courses', 'chapter', 'exam'));
    }

    public function destroy($id)
    {

        $chapter = CourseLesson::find($id);
        $materi[] = CourseMaterial::where('course_lesson_id', '=', $id)->get();
        $course_id = $chapter->course_id;
        foreach ($materi as $materi) {
            foreach ($materi as $materi) {
                $materi->delete();
            }
        }
        $chapter->delete();
        toast('Chapter Deleted Successfully', 'success');
        return redirect()->route('mentor.materi.show', $course_id);
        // return "hapus chapter";
    }
}
