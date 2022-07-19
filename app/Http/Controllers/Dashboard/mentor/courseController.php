<?php

namespace App\Http\Controllers\Dashboard\mentor;

use App\Models\exam;
use App\Models\User;
use App\Models\level;
use App\Models\course;
use lang\en\validation;
// use Dotenv\Validator;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use App\Models\CourseCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $courses = course::where('user_id', '=', Auth::user()->id)->get();
        $course = course::all();
        $courses = $course->count();
        $categories_id = course::all()->where('user_id', '=', Auth::user()->id)->pluck('category_id');
        $categories = CourseCategory::all()->whereIn('id', $categories_id);
        $exam = exam::all();
        // return course::all();

        return view('pages.dashboard.mentor.course.index', compact('courses', 'course', 'categories', 'exam'));
    }

    // public function data(){
    //     $courses = course::all();
    //     $coursesAll = $courses->count();
    //     $categories_id = course::all()->where('user_id', '=', Auth::user()->id)->pluck('category_id');
    //     $categories = CourseCategory::all()->whereIn('id', $categories_id);
    //     return datatables()->of($courses)->toJson();
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exam = exam::all();
        $categories_id = course::all()->where('user_id', '=', Auth::user()->id)->pluck('category_id');
        $courses = course::where('user_id', '=', Auth::user()->id)->get();
        $categories = CourseCategory::all();
        $level = level::all();
        return view('pages.dashboard.mentor.course.create', compact('categories', 'courses', 'level', 'exam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return "store";
        // debug, die & dump

        $image = $request->file('thumbnail');
        // return $image->extension();
        $dataImage = time() . '.' . $image->extension();
        // store image to storage/app/public/course/thumbnail
        $image->storeAs('course/thumbnail', $dataImage);
        // $image->move(public_path('thumnails'), $dataImage);
        // $image->move(public_path('assets/images/courses'), $dataImage);

        $user = Auth()->user()->id;
        $data = [
            'user_id' => $user,
            'courses_category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'price' => $request->price,
            'image' => $dataImage,
            'description' => $request->description,
            'course_level' => $request->course_level,
            'material' => $request->materi,
            'level' => $request->course_level,
        ];

        $course = new course();
        $course->user_id = $user;
        $course->name = $data['title'];
        $course->slug = $data['slug'];
        $course->image = $data['image'];
        $course->description = $data['description'];
        $course->course_category_id = $data['courses_category_id'];
        $course->level_id = $data['level'];
        $course->price = $data['price'];
        $course->save();

        toast('berhasil manambahkan data', 'success');
        return redirect()->route('mentor.course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "course";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $course = course::where('slug', $slug)->first();
        // return $courses->image;
        $course_category = CourseCategory::all();
        $level = level::all();
        $exam = exam::all();

        $courses = $course::all()->count();

        // $path =
        // $path = storage_path('assets/images/course/' . $courses->image);
        // $image = file_get_contents($path);
        // $image = base64_encode($image);
        // return $courses;
        return view('pages.dashboard.mentor.course.edit', compact('course', 'course_category', 'level', 'exam', 'courses'));
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

        $request->validate([
            'title' => 'required|string|max:255',
            'slug'  => 'required|string|max:255',
            'category_id' => 'required',
            'level_id' => 'required',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $image = $request->file('thumbnail');
        $firstImg = course::where('id', $id)->first()->image;

        if ($image == "") {
            $dataImage = $firstImg;
        } else {
            $dataImage = time() . '.' . $image->extension();

            Storage::delete('course/thumbnail/' . $firstImg);
            $image->storeAs('course/thumbnail', $dataImage);
            // File::delete(public_path('assets/images/courses/' . $firstImg));
            // $image->move(public_path('assets/images/courses'), $dataImage);
        }

        $data = [
            'title' => $request->title,
            'slug' => $request->slug,
            'course_category_id' => $request->category_id,
            'image' => $dataImage,
            'description' => $request->description,
            'price' => $request->price,
            'is_published' => $request->is_published,
            'level_id' => $request->level_id,
        ];

        $course = course::where('id', $id)->first();
        $course->name = $data['title'];
        $course->slug = $data['slug'];
        $course->image = $data['image'];
        $course->description = $data['description'];
        $course->course_category_id = $data['course_category_id'];
        $course->level_id = $data['level_id'];
        $course->price = $data['price'];
        $course->is_published = $data['is_published'];
        $course->save();

        toast()->success('Update has been succes');
        return redirect()->route('mentor.course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = course::find($id);
        File::delete(public_path('assets/images/courses/' . $course->image));
        $course->delete();
        toast()->success('Delete has been succes');
        return redirect()->route('mentor.course.index');
    }
}
