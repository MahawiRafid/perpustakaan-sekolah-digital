@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card bg-dark text-light shadow-sm border-0">
        <div class="card-body">
            <h3 class="mb-3">Data Anggota</h3>
            
            <div class="container mt-4 table-responsive">
                <table class="table table-bordered table-hover align-middle text-light">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Judul Buku</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $i => $t)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $t->anggota->nama_anggota ?? '-' }}</td>
                            <td>{{ $t->buku->judul_buku ?? '-' }}</td>
                            <td>{{ $t->tanggal_pinjam }}</td>
                            <td>{{ $t->tanggal_kembali ?? '-' }}</td>
                            <td>
                                <span class="badge {{ $t->status == 'dipinjam' ? 'bg-warning' : 'bg-success' }}">
                                    {{ $t->status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection