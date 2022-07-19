<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\OrderCourse;
use App\Models\OrderWebinar;
use App\Models\UserRole;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = User::where('user_role_id', '=', 3)->get();
        $orderC = OrderCourse::all();
        $orderW = OrderWebinar::all();
        return view('pages.Dashboard.admin.member.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Dashboard.admin.member.create', [
            'user_role' => UserRole::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'user_role_id' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->user_role_id = $request->user_role_id;
        $user->save();

        toast()->success('Berhasil menambahkan member baru', 'Berhasil');
        return redirect()->route('admin.member-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.Dashboard.admin.member.show', [
            'member' => User::findOrFail($id),
            // 'orderC' => OrderCourse::where('user_id', '=', $id)->get(),
            // 'orderW' => OrderWebinar::where('user_id', '=', $id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.Dashboard.admin.member.edit', [
            'member' => User::findOrFail($id),
            'user_role' => UserRole::all(),
        ]);
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'user_role_id' => 'required',
            'is_active' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_role_id = $request->user_role_id;
        $user->is_active = $request->is_active;
        $user->save();

        toast()->success('Berhasil mengubah member', 'Berhasil');
        return redirect()->route('admin.member-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        toast()->success('Berhasil menghapus member', 'Berhasil');
        return redirect()->route('admin.member-management.index');
    }
}
