@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card bg-dark text-light shadow-sm border-0">
        <div class="card-body">
            <h3 class="mb-3">Dashboard Siswa</h3>
            <div class="container mt-4">
            <div class="list-group">
                <a href="/siswa/pinjam" class="list-group-item">Peminjaman Buku</a>
                <a href="/siswa/kembali" class="list-group-item">Pengembalian Buku</a>
            </div>
        </div>
    </div>
</div>
@endsection