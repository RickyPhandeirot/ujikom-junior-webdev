<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pencatatan Pegawai</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('') }}assets/img/favicon.png" rel="icon">
    <link href="{{ asset('') }}assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="{{ asset('') }}https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('') }}assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('') }}assets/css/style.css" rel="stylesheet">

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .full-page-bg {
            background-image: url('assets/img/bground.jpg');
            /* Ganti dengan path gambar background Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100%;
            width: 100%;
        }

        .login-box {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 25%;
            /* Ubah lebarnya sesuai kebutuhan */
            max-width: 400px;
            /* Lebar maksimum jika menggunakan persentase */
            margin: 0 auto;
            /* Agar kotak berada di tengah halaman */
        }

        .login-box h1 {
            margin-bottom: 20px;
        }

        .login-box .btn {
            margin-top: 10px;
        }
    </style>
</head>

<body class="full-page-bg">

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <h1><a>Pencatatan Pegawai</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    @if (Auth::check())
                        {{-- jika sudah tampilan menu dashboard dan logout --}}
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @else
                        {{-- jika belum tampilkan register dan login --}}
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="{{ route('register') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
                    data-aos="fade-up">
                    <h1>Selamat Datang Di Pencatatan Pegawai</h1>
                    <div class="login-box">
                        @if (Auth::check())
                            <a class="btn-solid-lg page-scroll" href="{{ route('dashboard') }}">Dashboard</a>
                        @else
                            <a class="btn-solid-lg page-scroll" href="{{ route('login') }}">Login</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                    <img src="assets/img/pegawaiimg2.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->
    {{--
  <main id="main">




  </main><!-- End #main --> --}}



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('') }}assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('') }}assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('') }}assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('') }}assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('') }}assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('') }}assets/js/main.js"></script>

</body>

</html>
