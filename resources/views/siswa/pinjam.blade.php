@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card bg-dark text-light shadow-sm border-0">
        <div class="card-body">
            <h3 class="mb-3">Peminjaman Buku</h3>
            <div class="container mt-4">
            <div class="row">
                @foreach($buku as $b)
                <div class="col-md-6">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $b->judul_buku }}</h5>
                            <p class="card-text text-muted mb-1">
                                Pengarang: {{ $b->pengarang }}
                            </p>
                            <p class="card-text text-muted mb-1">
                                Penerbit: {{ $b->penerbit }}
                            </p>
                            <p class="card-text text-muted">
                                Tahun: {{ $b->tahun }}
                            </p>

                            <form method="POST" action="/siswa/pinjam">
                                @csrf
                                <input type="hidden" name="id_buku" value="{{ $b->id_buku }}">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Pinjam
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection