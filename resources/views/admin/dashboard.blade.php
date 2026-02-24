@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card bg-dark text-light shadow-sm border-0">
        <div class="card-body">
            <h3 class="mb-3">Dashboard Admin</h3>
            <div class="container mt-4">
            <div class="list-group mt-4">
                <a href="/admin/buku" class="list-group-item">Kelola Buku</a>
                <a href="/admin/anggota" class="list-group-item">Kelola Anggota</a>
                <a href="/admin/transaksi" class="list-group-item">Transaksi</a>
            </div>
        </div>
    </div>
</div>
@endsection