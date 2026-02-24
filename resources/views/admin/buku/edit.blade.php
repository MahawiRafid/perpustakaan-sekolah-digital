@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card bg-dark text-light shadow-sm border-0">
        <div class="card-body">
            <h3 class="mb-3">Edit Buku</h3>
            <div class="container mt-4">
            <form method="POST" action="/admin/buku/{{ $buku->id_buku }}">
                @csrf
                <input class="form-control mb-2" name="judul_buku" value="{{ $buku->judul_buku }}">
                <input class="form-control mb-2" name="pengarang" value="{{ $buku->pengarang }}">
                <input class="form-control mb-2" name="penerbit" value="{{ $buku->penerbit }}">
                <input class="form-control mb-2" name="tahun" value="{{ $buku->tahun }}">
                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection