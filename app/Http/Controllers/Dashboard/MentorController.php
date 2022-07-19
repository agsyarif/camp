<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailUser;
use App\Models\UserRole;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentor = User::where('user_role_id', '=', 2)->get();
        // $detail = DetailUser::where('user_id', '=', 2)->get();
        // $data = [
        //     $mentor,
        //     $detail
        // ];
        // return $detail;
        // return $detail;
        return view('pages.dashboard.admin.mentor.index', compact('mentor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.admin.mentor.create', [
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

        toast()->success('Berhasil menambahkan mentor', 'success');
        return redirect()->route('admin.mentor-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.dashboard.admin.mentor.show', [
            'mentor' => User::findOrFail($id),
            // 'detail' => DetailUser::where('user_id', '=', $id)->first(),
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
        return view('pages.dashboard.admin.mentor.edit', [
            'mentor' => User::findOrFail($id),
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

        toast()->success('Berhasil mengubah mentor', 'success');
        return redirect()->route('admin.mentor-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return 'destroy mentor';
        $user = User::findOrFail($id);
        $user->delete();

        toast()->success('Berhasil menghapus mentor', 'success');
        return redirect()->route('admin.mentor-management.index');
    }
}
