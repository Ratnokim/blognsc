<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;
use File;

class ProfileController extends Controller
{
    public function index()
    {
    	return view('admin.profile.index');
    }

    public function updateProfile(Request $request) 
    {
    	$user = Auth::user();
		$this->validate($request, [
			'name'	=> 'required',
			'email' => 'required|unique:users,email,' . $user->id
			]);

		$user->name 		= $request->get('name');
		$user->email 		= $request->get('email');
		$user->so_facebook 	= $request->get('so_facebook');
		$user->description 	= $request->get('description');

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
        }

		$user->save();

		Session::flash("flash_notification", [
			"level"=>"success",
			"message"=>"Profil berhasil diubah"
			]);

		return redirect('admin/profile');
    }

    public function editPassword() 
    {
    	return view('admin.profile.edit-password');
    }

    public function updatePassword(Request $request)
	{
		$user = Auth::user();
		$this->validate($request, [
			'password' 				=> 'required|passcheck:' . $user->password,
			'new_password' 			=> 'required|confirmed|min:6',
		], [
			'password.passcheck' 	=> 'Password lama tidak sesuai'
		]);

		$user->password = bcrypt($request->get('new_password'));
		$user->save();
		Session::flash("flash_notification", [
			"level"		=>"success",
			"message"	=>"Password berhasil diubah"
		]);

		return redirect('admin/password');
	}


}
