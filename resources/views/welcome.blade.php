<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Laporan Pengaduan Pemerintah</title>
  <meta name="description" content="Sistem Laporan Pengaduan Pemerintah - Platform pelaporan dan penanganan keluhan masyarakat secara efektif dan transparan">
  <meta name="keywords" content="pengaduan, laporan, pemerintah, masyarakat, keluhan, pelayanan publik">

  <!-- Favicons -->
  <link href="/api/placeholder/32/32" rel="icon">
  <link href="/api/placeholder/180/180" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    :root {
      --primary-color: #2563eb;
      --secondary-color: #1e40af;
      --dark-color: #1e293b;
      --light-color: #f8fafc;
      --gray-color: #64748b;
    }

    body {
      font-family: 'Open Sans', sans-serif;
      color: var(--dark-color);
    }

    h1, h2, h3, h4, h5, h6 {
      font-family: 'Poppins', sans-serif;
    }

    /* Header */
    .header {
      background: rgba(255, 255, 255, 0.95);
      padding: 15px 0;
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
    }

    .header .sitename {
      font-size: 24px;
      font-weight: 700;
      color: var(--primary-color);
      margin: 0;
    }

    .navbar ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      gap: 30px;
    }

    .navbar a {
      color: var(--dark-color);
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
    }

    .navbar a:hover,
    .navbar .active {
      color: var(--primary-color);
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
      padding: 160px 0 100px 0;
      min-height: 100vh;
      color: white;
    }

    .hero h1 {
      font-size: 48px;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .hero p {
      font-size: 18px;
      margin-bottom: 30px;
    }

    .hero-img {
      text-align: center;
    }

    .hero-img img {
      max-width: 100%;
      height: auto;
    }

    /* About Section */
    .about {
      padding: 80px 0;
      background: var(--light-color);
    }

    .section-title {
      text-align: center;
      margin-bottom: 50px;
    }

    .section-title h2 {
      font-size: 32px;
      font-weight: 700;
      position: relative;
      padding-bottom: 20px;
    }

    .section-title h2::after {
      content: '';
      position: absolute;
      left: 50%;
      bottom: 0;
      transform: translateX(-50%);
      width: 50px;
      height: 3px;
      background: var(--primary-color);
    }

    .about ul {
      list-style: none;
      padding: 0;
    }

    .about ul li {
      padding: 10px 0;
      display: flex;
      align-items: center;
    }

    .about ul li i {
      color: var(--primary-color);
      font-size: 20px;
      margin-right: 10px;
    }

    /* Buttons */
    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
      padding: 12px 30px;
      border-radius: 50px;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn-primary:hover {
      background-color: var(--secondary-color);
      border-color: var(--secondary-color);
      transform: translateY(-2px);
    }

    /* Footer */
    .footer {
      background: var(--dark-color);
      color: white;
      padding: 60px 0;
    }

    .footer h3 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .footer h4 {
      font-size: 18px;
      margin-bottom: 20px;
    }

    .footer p {
      margin-bottom: 20px;
      color: rgba(255, 255, 255, 0.8);
    }

    .social-links {
      display: flex;
      gap: 15px;
    }

    .social-links a {
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      color: white;
      text-decoration: none;
      transition: 0.3s;
    }

    .social-links a:hover {
      background: var(--primary-color);
      transform: translateY(-3px);
    }

    /* Mobile Navigation */
    .mobile-nav-toggle {
      display: none;
      font-size: 24px;
      cursor: pointer;
    }

    @media (max-width: 991px) {
      .mobile-nav-toggle {
        display: block;
      }

      .navbar ul {
        display: none;
        position: fixed;
        top: 70px;
        right: 0;
        left: 0;
        background: white;
        padding: 20px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        flex-direction: column;
        gap: 15px;
      }

      .navbar ul.active {
        display: flex;
      }

      .hero {
        text-align: center;
        padding: 120px 0 60px 0;
      }

      .hero-img {
        margin-top: 40px;
      }
    }
  </style>
</head>

<body>
  <!-- Header -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="{{ url('/dashboard') }}" class="logo d-flex align-items-center">
        {{-- <img src="/api/placeholder/40/40" alt="Logo" class="me-2"> --}}
        <h1 class="sitename">Laporan Pengaduan Pemerintah</h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#home" class="active">Home</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#services">Layanan</a></li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      @if (Route::has('login'))
        <div class="d-flex align-items-center gap-3">
          @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
          @else
            <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            @endif
          @endauth
        </div>
      @endif
    </div>
  </header>

  <!-- Main Content -->
  <main id="main">
    <!-- Hero Section -->
    <section id="home" class="hero d-flex align-items-center">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1>Suara Anda Penting Bagi Kami</h1>
            <p>Platform pelaporan pengaduan modern yang memudahkan masyarakat untuk menyampaikan keluhan dan mendapatkan solusi secara efektif dan transparan.</p>
            <div class="d-flex gap-3">
              <a href="{{ url('/login') }}" class="btn btn-primary">Mulai Lapor</a>
              <a href="#about" class="btn btn-light">Pelajari Lebih Lanjut</a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img">
            <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Tentang Kami</h2>
          <p>Membangun Jembatan Komunikasi antara Masyarakat dan Pemerintah</p>
        </div>
        <div class="row content">
          <div class="col-lg-6">
            <p>Sistem Laporan Pengaduan Pemerintah hadir sebagai solusi modern untuk:</p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Mempercepat proses penanganan keluhan masyarakat</li>
              <li><i class="bi bi-check-circle"></i> Meningkatkan transparansi dan akuntabilitas pelayanan publik</li>
              <li><i class="bi bi-check-circle"></i> Memudahkan tracking dan monitoring pengaduan</li>
              <li><i class="bi bi-check-circle"></i> Mengoptimalkan komunikasi antara masyarakat dan pemerintah</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Platform ini dirancang dengan mempertimbangkan kemudahan penggunaan dan efektivitas penanganan. Setiap laporan akan ditindaklanjuti oleh tim yang kompeten dan berpengalaman untuk memastikan setiap masalah mendapat solusi terbaik.
            </p>
            <p>
              Kami berkomitmen untuk terus meningkatkan kualitas pelayanan dan responsivitas terhadap kebutuhan masyarakat.
            </p>
            <a href="{{ url('/register') }}" class="btn btn-primary mt-3">Daftar Sekarang</a>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-4">
          <h3>Laporan Pengaduan Pemerintah</h3>
          <p>
            Gedung Pemerintahan Lt. 3<br>
            Jalan Merdeka No. 123<br>
            Kota Jakarta, Indonesia<br><br>
            <strong>Telepon:</strong> +62 21 1234 5678<br>
            <strong>Email:</strong> info@pengaduan.go.id<br>
          </p>
        </div>
        <div class="col-lg-4">
          <h4>Link Penting</h4>
          <ul class="list-unstyled">
            <li><a href="#about">Tentang Kami</a></li>
            <li><a href="#services">Layanan</a></li>
            <li><a href="#">Kebijakan Privasi</a></li>
            <li><a href="#">Syarat dan Ketentuan</a></li>
          </ul>
        </div>
        <div class="col-lg-4">
          <h4>Ikuti Kami</h4>
          <p>Ikuti kami di media sosial untuk mendapatkan informasi terbaru</p>
          <div class="social-links">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

  <!-- Main JS File -->
  <script>
    // Mobile Navigation Toggle
    document.querySelector('.mobile-nav-toggle').addEventListener('click', function() {
      document.querySelector('.navbar ul').classList.toggle('active');
    });

    // Smooth Scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });

    // Active Navigation on Scroll
    window.addEventListener('scroll', () => {
      let scrollPosition = window.scrollY + 200;
      document.querySelectorAll('section').forEach(section => {
        if (scrollPosition >= section.offsetTop && scrollPosition < (section.offsetTop + section.offsetHeight)) {
          document.querySelectorAll('.navbar a').forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === '#' + section.getAttribute('id')) {
              link.classList.add('active');
            }
          });
        }
      });
