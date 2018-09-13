<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Datatables;
use Session;
use Mail;
use File;

class UsersControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role'  => 'required'
        ]);

        $password = str_random(6);
        $request['password'] = bcrypt($password);

        $user = User::create($request->except('avatar'));

        if ($request->hasFile('avatar')) {

            $uploaded_avatar = $request->file('avatar');
            $extension = $uploaded_avatar->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_avatar->move($destinationPath, $filename);

            $user->avatar = $filename;
            $user->save();
        }
        else
        {
            $avatar = 'avatar.png';
            $user->avatar = $avatar;
            $user->save();
        }

        Mail::send('auth.emails.invite', compact('user', 'password'), function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Anda telah didaftarkan di LaraStock');
        });

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan data dengan email" .
            "<strong>" . $user['email'] . "</strong>" .
            " dengan password <strong>" . $password . "</strong>"
        ]);

        return redirect()->route('admin.users.index');



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
        $this->validate($request, [
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role'  => 'required'
        ]);

        $user = User::findOrFail($request->id);
        if(!$user->update($request->all())) return redirect()->back();

        $request['password'] = $request->get('password') ? bcrypt($request->get('password')) : $user->password;
        $request['email'] = $request->get('email') ? $request->get('email') : $user->email;

        if ($request->hasFile('avatar')) {
            // menambil cover yang diupload berikut ekstensinya
            $filename = null;
            $uploaded_avatar = $request->file('avatar');
            $extension = $uploaded_avatar->getClientOriginalExtension();

            // membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';

            // memindahkan file ke folder public/img
            $uploaded_avatar->move($destinationPath, $filename);

            // hapus cover lama, jika ada
            if ($user->avatar) {
                $old_avatar = $user->avatar;
                $filepath = public_path() . DIRECTORY_SEPARATOR . 'img'
                    . DIRECTORY_SEPARATOR . $user->avatar;

                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // File sudah dihapus/tidak ada
                }
            }

            // ganti field cover dengan cover yang baru
            $user->avatar = $filename;
            $user->save();
        }

        $user->update($request->all());

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $user->name"
        ]);

        return redirect()->route('admin.users.index');



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

    public function dataTable()
    {
        $users = User::query();
        return DataTables::of($users)
            ->addColumn('action', function ($users) {
                return view('admin.users._action', [
                    'model' => $users,
                    'id' => $users->id,
                    'name' => $users->name,
                    'email' => $users->email,
                    'role' => $users->role,
                    'so_facebook' => $users->so_facebook,
                    'description' => $users->description,
                    'avatar' => $users->avatar,        
                ]);
            })
            ->addColumn('picture', function ($users) {
                return '<img src="' . asset('img/'.$users->avatar) . '" height="70" width="70">';
            })
            ->rawColumns(['action', 'picture'])
            ->make(true);
    }
}
