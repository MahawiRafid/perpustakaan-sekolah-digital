@extends('layouts.auth')

@section('content')
<h3>Registrasi Anggota Perpustakaan</h3>

<form method="POST" action="/register-siswa">
    @csrf
    <input type="number" class="form-control mb-2" name="nis" placeholder="NIS" required>
    <input class="form-control mb-2" name="nama_anggota" placeholder="Nama Lengkap" required>
    <input class="form-control mb-2" name="kelas" placeholder="Kelas" required>
    <select class="form-control mb-2" name="jurusan" required>
    <option value="">-- Pilih Jurusan --</option>
        <option value="RPL">RPL</option>
        <option value="TKJ">TKJ</option>
        <option value="TJA">TJA</option>
        <option value="TR">TR</option>
        <option value="DKV">DKV</option>
    </select>

    <hr>

    <input class="form-control mb-2" name="username" placeholder="Username" required>
    <input type="password" class="form-control mb-2" name="password" placeholder="Password" required>

    <button class="btn btn-success">Daftar</button>
</form>
@endsection