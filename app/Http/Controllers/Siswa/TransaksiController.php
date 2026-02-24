<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function pinjamForm()
    {
        $buku = Buku::all();
        return view('siswa.pinjam', compact('buku'));
    }

    public function pinjam(Request $request)
    {
        $anggota = Anggota::where('id_user', session('id_user'))->first();

        Transaksi::create([
            'id_anggota' => $anggota->id_anggota,
            'id_buku' => $request->id_buku,
            'tanggal_pinjam' => date('Y-m-d'),
            'tanggal_kembali' => null,
            'status' => 'dipinjam'
        ]);

        return redirect('/siswa/pinjam')->with('success', 'Buku berhasil dipinjam');
    }

    public function kembaliForm()
    {
        $anggota = Anggota::where('id_user', session('id_user'))->first();
        
        $transaksi = Transaksi::with('buku')
                          ->where('id_anggota', $anggota->id_anggota)
                          ->where('status', 'dipinjam')
                          ->get();

        return view('siswa.kembali', compact('transaksi'));
    }

    public function kembali($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'tanggal_kembali' => date('Y-m-d'),
            'status' => 'dikembalikan'
        ]);

        return redirect('/siswa')->with('success', 'Buku berhasil dikembalikan');
    }
}