@extends('layouts.user')

{{-- Pembuka head --}}
@section('css')
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <style>
        /* Animasi untuk header dengan efek 3D */
        .header {
            animation: headerFadeIn 2s ease-out;
        }

        @keyframes headerFadeIn {
            0% { opacity: 0; transform: translateY(-50px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Animasi untuk teks "Report Services" dengan efek 3D */
        .text-center h2 {
            animation: slideIn3D 2s ease-out;
        }

        @keyframes slideIn3D {
            0% { opacity: 0; transform: translateX(-30px) rotateY(15deg); }
            100% { opacity: 1; transform: translateX(0) rotateY(0); }
        }

        /* Parallax Effect */
        .parallax {
            background-image: url('https://source.unsplash.com/1600x900/?nature');
            height: 300px;
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
            animation: fadeInParallax 3s ease-out;
        }

        @keyframes fadeInParallax {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        /* Wave Animation */
        .wave {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 20px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 100%;
            animation: waveAnimation 4s ease-in-out infinite;
        }

        .wave1 { animation-delay: 0s; }
        .wave2 { animation-delay: 0.5s; }
        .wave3 { animation-delay: 1s; }
        .wave4 { animation-delay: 1.5s; }

        @keyframes waveAnimation {
            0% { transform: translateX(0); }
            50% { transform: translateX(30px); }
            100% { transform: translateX(0); }
        }

        /* Card Animasi Slide */
        .content {
            animation: bounceInUp 1s ease-out;
        }

        @keyframes bounceInUp {
            0% { opacity: 0; transform: translateY(30px); }
            60% { opacity: 1; transform: translateY(-10px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Tombol Hover dengan Efek Neon */
        .btn-custom {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            background-color: #6c4ab6;
        }

        .btn-custom:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background-color: rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
        }

        .btn-custom:hover {
            background-color: #8e44ad;
            box-shadow: 0 0 15px #fff, 0 0 30px #8e44ad;
        }

        .btn-custom:hover:before {
            width: 0;
            height: 0;
            opacity: 1;
        }

        /* Penghitungan Total Laporan dengan efek animasi */
        .pengaduan h2 {
            font-size: 3rem;
            color: white;
            animation: scaleUp 2s ease-out forwards;
        }

        @keyframes scaleUp {
            0% { opacity: 0; transform: scale(0.5); }
            100% { opacity: 1; transform: scale(1); }
        }

        /* Footer Animasi Fade In */
        .footer {
            animation: fadeFooter 2s ease-out forwards;
        }

        @keyframes fadeFooter {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        /* Efek Hover untuk Link Navbar */
        .nav-link {
            position: relative;
            display: inline-block;
            overflow: hidden;
            color: #fff;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: #fff;
            bottom: 0;
            left: -100%;
            transition: all 0.3s ease;
        }

        .nav-link:hover::after {
            left: 0;
        }
    </style>
@endsection

@section('title', 'Rehub - E-Report Hub')

{{-- Penutup Head --}}

{{-- Pembuka Body --}}
@section('content')

    {{-- Section Header --}}
    <section class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
            <div class="container">
                <div class="container-fluid">
                    <a href="#" class="navbar-brand">
                        <h4 class="semi-bold mb-0 text-white">REHUB</h4>
                        <p class="italic mt-0 text-white">E-Report Hub</p>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        @if (Auth::guard('masyarakat')->check())
                            <ul class="navbar-nav text-center ml-auto">
                                <li class="nav-item">
                                    <a href="#" class="nav-link ml-auto text-white">
                                        Report
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link ml-auto text-white"
                                        style="text-decoration: underline">
                                        {{ Auth::guard('masyarakat')->user()->nama }}
                                    </a>
                                </li>
                            </ul>
                        @else
                            <ul class="navbar-nav text-center ml-auto">
                                <li class="nav-item">
                                    <button class="btn text-white btn-warning" type="button" data-toggle="modal"
                                        data-target="#loginModal">
                                        Login
                                    </button>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('ereporthub.formRegister') }}" class="btn btn-outline-purple">Register</a>
                                </li>
                            </ul>
                        @endif

                    </div>

                </div>
            </div>
        </nav>

        <div class="text-center">
            <h2 class="medium text-white mt-3">Report Services</h2>
            <p class="italic text-white mb-5">Tell us About Your Report</p>
        </div>

        <!-- Parallax Section -->
        <div class="parallax"></div>

        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>

    </section>

    {{-- Section Card Report --}}
    <div class="row justify-content-center">
        <div class="col-lg-6 col-10 col">
            <div class="content shadow">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

                @if (Session::has('pengaduan'))
                    <div class="alert alert-{{ Session::get('alert-type') }}">{{ Session::get('pengaduan') }}</div>
                @endif

                <div class="card mb-3">Create Your Report Here</div>
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="isi_laporan" placeholder="Write Your Report Here" class="form-control" rows="4">
                            {{ old('isi_laporan') }}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-custom mt-2">Send</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Hitung Pengaduan -->
    <div class="pengaduan mt-5">
        <div class="bg-purple">
            <div class="text-center">
                <h5 class="medium text-white mt-3">Report Total</h5>
                <h2 class="medium text-white">10</h2>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer mt-5">
        <hr> 
        <div class="text-center">
            <p class="italic text-secondary">!! Tomket 2024 . The red of the azam**</p>
        </div>   
    </div>

@endsection

@section('js')
    @if (Session::has('pesan'))
        <script>
            $('#loginModal').modal('show');
        </script>
    @endif
@endsection
