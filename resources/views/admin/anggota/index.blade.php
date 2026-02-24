@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card bg-dark text-light shadow-sm border-0">
        <div class="card-body">
            <h3 class="mb-3">Data Anggota</h3>

            <a href="/admin/anggota/create" class="btn btn-primary mb-3">Tambah Anggota</a>

            <div class="container mt-4 table-responsive">
                <table class="table table-bordered table-hover align-middle text-light">
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($anggota as $item)
                    <tr>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nama_anggota }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->jurusan }}</td>

                        <td>{{ $item->user->username }}</td>

                        <td>
                            <span id="pw-{{ $item->id_anggota }}">••••••••</span>
                            <span class="d-none" id="pw-show-{{ $item->id_anggota }}">
                                {{ $item->user->password }}
                            </span>
                            <button 
                                class="btn btn-sm btn-outline-light ms-2" 
                                data-id="{{ $item->id_anggota }}"
                                onclick="togglePassword(this)">
                                👁️
                            </button>
                        </td>

                        <td>
                            <a href="/admin/anggota/{{ $item->id_anggota }}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/admin/anggota/{{ $item->id_anggota }}/delete" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                @endforeach
                </table>
        </div>
    </div>
</div>

<script>
function togglePassword(el) {
    const id = el.getAttribute('data-id');
    const hidden = document.getElementById('pw-' + id);
    const show = document.getElementById('pw-show-' + id);

    hidden.classList.toggle('d-none');
    show.classList.toggle('d-none');
}
</script>

@endsection