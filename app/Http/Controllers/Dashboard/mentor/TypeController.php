<?php

namespace App\Http\Controllers\Dashboard\mentor;

use App\Models\course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\exam;
use App\Models\type;

class TypeController extends Controller
{
    public function show($id)
    {
        $courses = course::all()->count();
        $exam = exam::all();
        $id = $id;
        return view('pages.Dashboard.mentor.type.create', compact('courses', 'exam', 'id'));
    }

    public function store(Request $request)
    {
        $id_exam = $request->id_exam;
        // return $id_exam;
        $exam = exam::all();
        $name = $request->title;
        $namem = [];
        for ($i = 0; $i < count($name); $i++) {
            // $namem[$i] = $name[$i];
            $isi = new type;
            $isi->name = $name[$i];
            $isi->save();
        }
        // return $namem;

        toast()->success("Add Type Has Been Success");
        return redirect()->route('mentor.question.show', $id_exam);
        // return redirect()->route('mentor.type.index')->with('success', 'Type berhasil ditambahkan');
    }
}
