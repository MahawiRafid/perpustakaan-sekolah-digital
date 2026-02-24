<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Anggota;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function form()
    {
        return view('siswa.register');
    }

    public function store(Request $request)
    {
            $request->validate([
                'nis' => 'required|numeric',
                'jurusan' => 'required|in:RPL,TKJ,TJA,TR,DKV',
            ]);

        // bikin akun user
        $user = User::create([
            'username' => $request->username,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'role' => 'siswa'
        ]);

        // bikin data anggota
        Anggota::create([
            'id_user' => $user->id_user,
            'nis' => $request->nis,
            'nama_anggota' => $request->nama_anggota,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login');
    }
}