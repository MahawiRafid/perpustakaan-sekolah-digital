@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card bg-dark text-light shadow-sm border-0">
        <div class="card-body">
            <h3 class="mb-3">Data Buku</h3>

            <a href="/admin/buku/create" class="btn btn-primary mb-3">Tambah Buku</a>

            <div class="container mt-4 table-responsive">
                <table class="table table-bordered table-hover align-middle text-light">
                    <tr>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($buku as $b)
                    <tr>
                        <td>{{ $b->judul_buku }}</td>
                        <td>{{ $b->pengarang }}</td>
                        <td>{{ $b->penerbit }}</td>
                        <td>{{ $b->tahun }}</td>
                        <td>
                            <a href="/admin/buku/{{ $b->id_buku }}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/admin/buku/{{ $b->id_buku }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


@endsection