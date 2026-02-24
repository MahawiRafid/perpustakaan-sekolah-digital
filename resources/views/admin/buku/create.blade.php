@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card bg-dark text-light shadow-sm border-0">
        <div class="card-body">
            <h3 class="mb-3">Tambah Buku</h3>
            <div class="container mt-4">
            <form method="POST" action="/admin/buku">
                @csrf   
                <input class="form-control mb-2" name="judul_buku" placeholder="Judul Buku">
                <input class="form-control mb-2" name="pengarang" placeholder="Pengarang">
                <input class="form-control mb-2" name="penerbit" placeholder="Penerbit">
                <input class="form-control mb-2" name="tahun" placeholder="Tahun">
                <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection