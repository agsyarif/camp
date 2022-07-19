<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return auth()->user();
        return view('pages.Dashboard.admin.profile.index', [
            'user' => auth()->user(),
        ]);
        // return 'Profile index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
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
        return view('pages.Dashboard.admin.profile.edit', [
            'user' => auth()->user(),
        ]);
        return 'edit profile';
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
        // dd($request->file('photo'));
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            'contact_number' => 'nullable|string|max:255',
        ]);

        $awal = User::where('id', $id)->first();
        $profile_awal = $awal->profile_photo_path;
        File::delete('assets/images/profile/' . $profile_awal);

        $image = $request->file('photo')->getClientOriginalName();

        $request->file('photo')->move(public_path('assets/images/profile'), $image);
        // return $ini = $path_profile;
        $data = [
            'name' => $request->name,
            'profile_photo_path' => $image,
            'email' => $request->email,
            'password' => $request->password,
            'contact_number' => $request->contact_number,
        ];
        // return $data;

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->contact_number = $request->contact_number;
        $user->profile_photo_path = $image;
        $user->save();

        toast()->success('Berhasil mengubah data profile', 'Berhasil');
        return redirect()->route('admin.profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return 'destroy';
        $profile = User::findOrFail($id);
        $photoName = $profile->profile_photo_path;

        $user = auth()->user();
        $user->profile_photo_path = null;
        $user->save();
        File::delete('assets/images/profile/' . $photoName);

        // if ($user->profile_photo_path == null) {
        //     alert('berhasil');
        // } else {
        //     alert('gagal');
        // }

        return redirect()->route('admin.profile.index');
    }
}
