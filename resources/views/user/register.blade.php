@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
<style>
    /* Background parallax effect */
    body {
        background: linear-gradient(270deg, #3b82f6, #60a5fa, #3b82f6);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        overflow: hidden;
        position: relative;
    }

    /* Animasi bounce-in untuk teks Registrasi */
    .bounce-in {
        animation: bounceIn 1s ease-out forwards;
    }

    @keyframes bounceIn {
        0% {
            transform: scale(0);
            opacity: 0;
        }
        50% {
            transform: scale(1.2);
            opacity: 1;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* Fade-in dengan slide-up untuk form dan teks */
    .fade-slide-up {
        opacity: 0;
        transform: translateY(30px);
        transition: all 1s ease-out;
    }

    .fade-slide-up.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Gradasi teks "Registrasi" */
    .gradient-text {
        background: linear-gradient(90deg, #3b82f6, #8b5cf6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: bold;
        font-size: 3rem;
        text-align: center;
        display: inline-block;
    }

    /* Styling untuk form container */
    .registration-form {
        background: white;
        padding: 32px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        width: 400px;
        max-width: 100%;
        z-index: 10;
    }

    /* Input dan tombol dengan animasi hover */
    input, button {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    input:focus, button:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 16px;
    }

    label {
        margin-bottom: 8px;
        color: #1f2937;
    }

    input {
        background-color: white;
        padding: 10px;
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
    }

    button {
        width: 100%;
        background-color: #3b82f6;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1rem;
        margin-top: 16px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #2563eb;
    }

    .text-center {
        text-align: center;
    }

    /* Menambahkan animasi ketika tombol kembali di hover */
    a {
        display: block;
        margin-top: 12px;
        text-align: center;
        color: #3b82f6;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #2563eb;
    }
</style>
@endsection

@section('title', 'Rehub - Register')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rehub - Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <!-- Form Container -->
    <div class="registration-form fade-slide-up" id="registration-form">
        <h2 class="gradient-text bounce-in" id="registration-title">Registrasi</h2>
        <p class="text-center mb-4 text-gray-600">Bergabunglah dengan komunitas kami dan dapatkan manfaat eksklusif!</p>
        <form action="#" method="post">
            <div class="form-group">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama:</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-500 transition duration-150 ease-in-out" placeholder="Masukkan nama lengkap Anda">
            </div>
            <div class="form-group">
                <label for="nik" class="block text-sm font-medium text-gray-700">NIK:</label>
                <input type="text" id="nik" name="nik" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-500 transition duration-150 ease-in-out" placeholder="Masukkan Nomor Induk Kependudukan">
            </div>
            <div class="form-group">
                <label for="telpon" class="block text-sm font-medium text-gray-700">Telpon:</label>
                <input type="tel" id="telpon" name="telpon" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-500 transition duration-150 ease-in-out" placeholder="Masukkan nomor telepon Anda">
            </div>
            <div class="form-group">
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="password" id="password" name="password" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-500 transition duration-150 ease-in-out" placeholder="Masukkan password Anda">
            </div>
            <button type="submit" class="btn-purple mt-4">Daftar</button>
        </form>
        <a href="{{ url('/') }}" class="mt-4 inline-block text-center text-blue-600 hover:underline">Kembali ke Layar Utama</a>
    </div>

    <!-- Session Message -->
    @if(Session::has('pesan'))
    <div class="alert alert-danger mt-2">
        {{ Session::get('pesan') }}
    </div>
    @endif

    <script>
        // JavaScript untuk menambahkan animasi
        window.onload = function() {
            // Mengambil elemen dengan ID 'registration-title' dan 'registration-form'
            const title = document.getElementById('registration-title');
            const form = document.getElementById('registration-form');

            // Menambahkan kelas 'visible' pada elemen setelah halaman selesai dimuat
            setTimeout(function() {
                title.classList.add('visible'); // Menampilkan judul dengan efek bounce-in
            }, 300); // Menunggu 300ms sebelum animasi dimulai

            setTimeout(function() {
                form.classList.add('visible'); // Menampilkan form dengan efek fade-slide-up
            }, 600); // Menunggu 600ms agar form muncul setelah judul
        };
    </script>
</body>
</html>
