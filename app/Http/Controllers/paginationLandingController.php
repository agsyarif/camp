<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;

class paginationLandingController extends Controller
{
    public function allCourse()
    {
        $course = course::paginate(10);
        return $course;
    }
}
