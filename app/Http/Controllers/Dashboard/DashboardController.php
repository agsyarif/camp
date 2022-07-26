<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\exam;
use App\Models\User;
use App\Models\Order;
use App\Models\course;
use App\Models\akses_course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\checkout_course;
use Illuminate\Support\Facades\Auth;
// use Auth;


class DashboardController extends Controller
{

    public function __cunsruct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user();
        // return $user->user_role_id;
        // return "dashboard";
        $orders = Order::all();
        // $users = User::all();
        $allMentor = User::where('user_role_id', '=', 2)->count();
        $allMember = User::all()->where('user_role_id', '=', '3')->count();
        // $allUser = User::all()->count();
        $allCourse = course::all()->count();
        $allOrder = Order::all()->count();
        // $courses = course::where('user_id', '=', Auth::user()->id)->get();
        $active = 'home';
        $exam = exam::all();
        // $courses = $course;

        if (Auth::user()->user_roles->name == 'Admin') {

            $courses = course::all()->count();

            return view('pages.Dashboard.index', compact('orders', 'courses', 'allMentor', 'allMember', 'allCourse', 'allOrder', 'active'));
        } else if (Auth::user()->user_roles->name == 'Mentor') {

            $courses = course::all()->count();


            return view('pages.Dashboard.index', compact('orders', 'courses', 'allMentor', 'allMember', 'allCourse', 'allOrder', 'active', 'exam'));
        } else if (Auth::user()->user_role_id == '3') {
            // ambil data yang dimiliki user
            $aksesCourse = akses_course::where('user_id', '=', Auth::user()->id)->get();
            $id_course = [];
            foreach ($aksesCourse as $key => $value) {
                $id_course[] = $value->course_id;
            }
            $course = course::whereIn('id', $id_course)->get();
            $courses = $course->count();

            $transaksi = checkout_course::where('user_id', '=', Auth::user()->id)->get();

            return view('pages.Dashboard.member.index', compact('orders', 'courses', 'allMentor', 'allMember', 'allCourse', 'allOrder', 'transaksi', 'active'));
        }
        // return view('pages.dashboard.admin.index', compact('orders', 'courses', 'allMentor', 'allMember', 'allCourse', 'allOrder', 'active', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
