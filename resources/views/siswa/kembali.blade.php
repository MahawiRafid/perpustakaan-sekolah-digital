@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card bg-dark text-light shadow-sm border-0">
        <div class="card-body">
            <h3>Pengembalian Buku</h3>
            <div class="container mt-4 table-responsive">
                <table class="table table-bordered table-hover align-middle text-light">
                    <tr>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($transaksi as $t)
                    <tr>
                        <td>{{ $t->buku->judul_buku ?? '-' }}</td>
                        <td>{{ $t->tanggal_pinjam }}</td>
                        <td>
                            <a href="/siswa/kembali/{{ $t->id_transaksi }}" class="btn btn-success btn-sm">
                                Kembalikan
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection