@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card bg-dark text-light shadow-sm border-0">
        <div class="card-body">
            <h3 class="mb-3">Tambah Anggota</h3>
            <div class="container mt-4">
            <form method="POST" action="/admin/anggota">
                @csrf

                <input type="number" class="form-control mb-2" name="nis" placeholder="NIS" required>
                <input class="form-control mb-2" name="nama_anggota" placeholder="Nama Anggota" required>
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

                <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection