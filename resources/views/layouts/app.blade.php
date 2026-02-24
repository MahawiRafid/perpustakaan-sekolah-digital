<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Perpustakaan Digital</a>

        <ul class="navbar-nav me-auto">
            @if(session('role') == 'admin')
                <li class="nav-item"><a class="nav-link" href="/admin">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/buku">Buku</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/anggota">Anggota</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/transaksi">Transaksi</a></li>
            @else
                <li class="nav-item"><a class="nav-link" href="/siswa">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/siswa/pinjam">Pinjam Buku</a></li>
                <li class="nav-item"><a class="nav-link" href="/siswa/kembali">Pengembalian</a></li>
            @endif
        </ul>

        <a href="/logout" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>