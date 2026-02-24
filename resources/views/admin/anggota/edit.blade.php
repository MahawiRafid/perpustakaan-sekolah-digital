@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card bg-dark text-light shadow-sm border-0">
        <div class="card-body">
            <h3 class="mb-3">Edit Anggota</h3>
            <div class="container mt-4">
            <form method="POST" action="/admin/anggota/{{ $anggota->id_anggota }}">
                @csrf

                <input type="number" class="form-control mb-2" name="nis" value="{{ $anggota->nis }}" placeholder="NIS" required>
                <input class="form-control mb-2" name="nama_anggota" value="{{ $anggota->nama_anggota }}" placeholder="Nama Anggota" required>
                <input class="form-control mb-2" name="kelas" value="{{ $anggota->kelas }}" placeholder="Kelas" required>
                <select class="form-control mb-2" name="jurusan" required>
                    <option value="RPL" {{ $anggota->jurusan == 'RPL' ? 'selected' : '' }}>RPL</option>
                    <option value="TKJ" {{ $anggota->jurusan == 'TKJ' ? 'selected' : '' }}>TKJ</option>
                    <option value="TJA" {{ $anggota->jurusan == 'TJA' ? 'selected' : '' }}>TJA</option>
                    <option value="TR"  {{ $anggota->jurusan == 'TR'  ? 'selected' : '' }}>TR</option>
                    <option value="DKV" {{ $anggota->jurusan == 'DKV' ? 'selected' : '' }}>DKV</option>
                </select>

                <hr>

                <input class="form-control mb-2" name="username" value="{{ $anggota->user->username }}" placeholder="Username" required>
                <input type="password" class="form-control mb-2" name="password" placeholder="Password Baru (opsional)">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>

                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection