<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('admin.anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('admin.anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric',
            'jurusan' => 'required|in:RPL,TKJ,TJA,TR,DKV',
        ]);

        // bikin akun user (role siswa)
        $user = \App\Models\User::create([
            'username' => $request->username,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'role' => 'siswa'
        ]);

        // bikin data anggota
        \App\Models\Anggota::create([
            'id_user' => $user->id_user,
            'nis' => $request->nis,
            'nama_anggota' => $request->nama_anggota,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan
        ]);

        return redirect('/admin/anggota')->with('success', 'Anggota berhasil ditambahkan');
    }

    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        $users = User::where('role', 'siswa')->get();
        return view('admin.anggota.edit', compact('anggota', 'users'));
    }

    public function update(Request $request, $id)
    {
        $anggota = \App\Models\Anggota::with('user')->findOrFail($id);

        $request->validate([
            'nis' => 'required|numeric',
            'jurusan' => 'required|in:RPL,TKJ,TJA,TR,DKV',
            'username' => 'required'
        ]);

        // update anggota
        $anggota->update([
            'nis' => $request->nis,
            'nama_anggota' => $request->nama_anggota,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan
        ]);

        // update user
        $anggota->user->username = $request->username;

        if ($request->password) {
            $anggota->user->password = password_hash($request->password, PASSWORD_DEFAULT);
        }

        $anggota->user->save();

        return redirect('/admin/anggota')->with('success', 'Anggota berhasil diupdate');
    }

    public function destroy($id)
    {
        Anggota::destroy($id);
        return redirect('/admin/anggota')->with('success', 'Anggota berhasil dihapus');
    }
}