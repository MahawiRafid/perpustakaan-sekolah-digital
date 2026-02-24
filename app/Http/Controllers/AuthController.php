<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        // dd($user->password);

        if (!$user) {
            return back()->with('error', 'Username salah');
        }

        // CEK APAKAH PASSWORD SUDAH DI-HASH
        if (strlen($user->password) < 60) {


            if (trim($request->password) !== trim($user->password)) {
                return back()->with('error', 'Password salah');
            }

            $user->password = password_hash($request->password, PASSWORD_DEFAULT);
            $user->save();

        } else {

            if (!password_verify($request->password, $user->password)) {
                return back()->with('error', 'Password salah');
            }
        }

        // SESSION
        session([
            'login' => true,
            'id_user' => $user->id_user,
            'role' => $user->role
        ]);

        // REDIRECT SESUAI ROLE
        if ($user->role == 'admin') {
            return redirect('/admin');
        } else {
            return redirect('/siswa');
        }
    }


    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
