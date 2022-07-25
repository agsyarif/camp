<?php

namespace App\Http\Controllers\Dashboard\mentor;

use App\Models\course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\exam;
use App\Models\type;

class TypeController extends Controller
{
    public function create()
    {
        $courses = course::all()->count();
        $exam = exam::all();
        return view('pages.Dashboard.mentor.type.create', compact('courses', 'exam'));
    }

    public function store(Request $request)
    {
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
        return redirect()->route('mentor.exam.create');
        // return redirect()->route('mentor.type.index')->with('success', 'Type berhasil ditambahkan');
    }
}
