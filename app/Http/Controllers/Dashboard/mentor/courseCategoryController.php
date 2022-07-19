<?php

namespace App\Http\Controllers\Dashboard\mentor;

use App\Models\exam;
use App\Models\course;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class courseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(404);
    }

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
        $categories = CourseCategory::all()->whereIn('id', $categories_id);
        return view('pages.Dashboard.mentor.course_category.create', compact('categories', 'courses', 'exam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
        ];
        $category = new CourseCategory();
        $category->name = $data['title'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        $category->save();

        toast('Category Added Successfully', 'success');
        return redirect()->route('mentor.course.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
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
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }
}
