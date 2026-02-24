@extends('layouts.auth')

@section('content')
<h2>Login</h2>

@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

<form method="POST" action="/login">
    @csrf
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit">Login</button>
    <p class="mt-2">
        Belum jadi anggota? 
        <a href="/register-siswa">Register Anggota</a>
    </p>
</form>
@endsection
