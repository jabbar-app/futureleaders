@extends('front-page.main')

@section('content')
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="/" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('assets/fli/fli-logo.svg') }}" alt="YFLI">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#services">Program</a></li>
          <li><a href="#faq">FAQ</a></li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('candidate.dashboard') }}">Daftar Sekarang</a>
    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <img src="assets/img/hero-bg-abstract.jpg" alt="" data-aos="fade-in">
      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-out">
          <div class="col-xl-7 col-lg-9 text-center">
            <h1>Langkat-Binjai Future Leaders 2025</h1>
            <p>Program Pengembangan Calon Pemimpin Daerah Bertaraf Global</p>
          </div>
          <div id="countdown-hero" class="d-flex justify-content-center gap-4 mt-4">
            <div class="text-center">
              <h3 id="hero-days">00</h3>
              <small>Hari</small>
            </div>
            <div class="text-center">
              <h3 id="hero-hours">00</h3>
              <small>Jam</small>
            </div>
            <div class="text-center">
              <h3 id="hero-minutes">00</h3>
              <small>Menit</small>
            </div>
            <div class="text-center">
              <h3 id="hero-seconds">00</h3>
              <small>Detik</small>
            </div>
          </div>
        </div>
        <div class="text-center" data-aos="zoom-out" data-aos-delay="100">
          <div class="d-flex justify-content-center align-items-center gap-2">
            <a href="{{ asset('files/YFLI Handbook - Langkat Binjai 2025.pdf') }}" class="btn-outline-primary"
              download>Unduh Panduan</a>
            <a href="{{ route('candidate.dashboard') }}" class="btn-get-started">Daftar Sekarang</a>
          </div>
        </div>
        <div class="row gy-4 mt-5">
          <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-lightbulb"></i></div>
              <h4 class="title">Visi Global</h4>
              <p class="description">Membuka wawasan peserta untuk berpikir dan bertindak secara internasional.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-people"></i></div>
              <h4 class="title">Jejaring Luas</h4>
              <p class="description">Bersama komunitas & alumni Future Leaders se-Indonesia dan dunia.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-rocket"></i></div>
              <h4 class="title">Aksi Nyata</h4>
              <p class="description">Peserta menjalankan proyek sosial nyata untuk daerah asalnya.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-globe"></i></div>
              <h4 class="title">International Camp</h4>
              <p class="description">Belajar langsung di Kuala Lumpur, Malaysia selama 3 Hari 2 Malam.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Program</h2>
        <p>Langkat-Binjai Future Leaders adalah gerakan pencetak pemimpin muda dari Langkat dan Binjai untuk Indonesia,
          bahkan untuk dunia.</p>
      </div>
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>Program ini hadir sebagai ajang pembentukan karakter, kepemimpinan, dan pengalaman nyata yang kelak akan
              menjadi bekal berharga dalam kehidupan mereka.</p>
            <ul>
              <li><i class="bi bi-check2-circle"></i> <span>Leadership Training & Growth Mindset</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Social Project Execution di Komunitas</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>International Exposure ke Kuala Lumpur, Malaysia</span></li>
            </ul>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>Melalui proses seleksi yang ketat, peserta akan dipersiapkan menjadi pemimpin yang tidak hanya unggul dalam
              pengetahuan, tapi juga karakter dan kepedulian sosialnya.</p>
            <a href="{{ route('candidate.dashboard') }}" class="read-more"><span>Daftar Sekarang</span><i
                class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2>Rangkaian Program</h2>
        <p>Proses pengembangan calon pemimpin masa depan dari Langkat & Binjai.</p>
      </div>
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item">
              <div class="icon"><i class="bi bi-pencil-square"></i></div>
              <h3>Pendaftaran</h3>
              <p>Mengisi formulir, menulis esai, dan mengikuti tes kepribadian MBTI.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item">
              <div class="icon"><i class="bi bi-chat-left-dots"></i></div>
              <h3>Wawancara & Seleksi</h3>
              <p>Menilai motivasi, visi sosial, dan potensi kepemimpinan peserta.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item">
              <div class="icon"><i class="bi bi-people-fill"></i></div>
              <h3>Local Bootcamp</h3>
              <p>Pelatihan intensif tentang kepemimpinan, teamwork, dan komunikasi.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item">
              <div class="icon"><i class="bi bi-lightning-charge"></i></div>
              <h3>Project Sosial</h3>
              <p>Peserta merancang dan menjalankan proyek sosial nyata di lingkungannya.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item">
              <div class="icon"><i class="bi bi-airplane-engines"></i></div>
              <h3>International Camp</h3>
              <p>Study trip ke Kuala Lumpur, Malaysia: pelatihan global & cultural exchange.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item">
              <div class="icon"><i class="bi bi-stars"></i></div>
              <h3>Alumni Network</h3>
              <p>Gabung komunitas alumni Future Leaders dan terlibat dalam program lanjutan.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="countdown" class="stats section light-background">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <h2 class="mb-4">Penutupan Pendaftaran Batch 1</h2>
            <p class="lead">Pendaftaran Batch 1 akan ditutup pada <strong>25 April 2025</strong>. Pastikan kamu sudah
              mendaftar sebelum waktu habis!</p>
            <div id="countdown-section" class="d-flex justify-content-center gap-4 mt-4">
              <div class="text-center">
                <h3 id="section-days">00</h3>
                <small>Hari</small>
              </div>
              <div class="text-center">
                <h3 id="section-hours">00</h3>
                <small>Jam</small>
              </div>
              <div class="text-center">
                <h3 id="section-minutes">00</h3>
                <small>Menit</small>
              </div>
              <div class="text-center">
                <h3 id="section-seconds">00</h3>
                <small>Detik</small>
              </div>
            </div>

            <div class="text-center" data-aos="zoom-out" data-aos-delay="100">
              <div class="d-flex justify-content-center align-items-center gap-2">
                <a href="{{ asset('files/YFLI Handbook - Langkat Binjai 2025.pdf') }}" class="btn-outline-primary"
                  download>Unduh Panduan</a>
                <a href="{{ route('candidate.dashboard') }}" class="btn-get-started">Daftar Sekarang</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2>Pertanyaan Umum</h2>
        <p>Informasi penting seputar program Langkat-Binjai Future Leaders.</p>
      </div>
      <div class="container">
        <div class="faq-container">
          <div class="faq-item faq-active">
            <h3>Apakah program ini gratis?</h3>
            <div class="faq-content">
              <p>Ya! Seluruh rangkaian program mulai dari pendaftaran, pelatihan, hingga keberangkatan ke luar negeri
                difasilitasi penuh oleh YLFI.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div>
          <div class="faq-item">
            <h3>Apakah saya harus aktif organisasi untuk mendaftar?</h3>
            <div class="faq-content">
              <p>Tidak harus. Yang penting kamu punya semangat belajar dan kontribusi untuk sekitar.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div>
          <div class="faq-item">
            <h3>Apakah wajib bisa Bahasa Inggris?</h3>
            <div class="faq-content">
              <p>Tidak. Yang penting punya keberanian untuk belajar dan mencoba. Program akan membantu pengembangan
                komunikasi globalmu.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div>
          <div class="faq-item">
            <h3>Kalau gagal di tahun ini, apakah bisa mendaftar lagi?</h3>
            <div class="faq-content">
              <p>Bisa banget! Program ini berlangsung setiap tahun dan kami sangat menghargai peserta yang tetap semangat
                mencoba kembali.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div>
        </div>
      </div>
    </section>

    <section id="about-alt" class="about-alt section">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
            <img src="{{ asset('assets/img/kuala-lumpur.webp') }}" class="img-fluid" alt="Kuala Lumpur">
            <a href="https://www.youtube.com/watch?v=F8mnX0bpbK4" class="glightbox pulsating-play-btn"
              title="Watch Our Trip"></a>
          </div>
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
            <h3>Pengalaman Global yang Tak Terlupakan di Kuala Lumpur</h3>
            <p class="fst-italic">
              Puncak dari seluruh proses Langkat-Binjai Future Leaders adalah pengalaman belajar langsung di luar negeri.
            </p>
            <ul>
              <li><i class="bi bi-check2-all"></i> <span>Leadership Workshop: pelatihan kepemimpinan tingkat lanjut
                  dengan trainer internasional.</span></li>
              <li><i class="bi bi-check2-all"></i> <span>Cultural Exchange: bertemu dan belajar dari komunitas
                  internasional.</span></li>
              <li><i class="bi bi-check2-all"></i> <span>City Exploration: mengeksplorasi landmark ikonik di Kuala Lumpur
                  dan memahami praktik urban development.</span></li>
            </ul>
            <p>
              Kami percaya, melihat dunia adalah cara terbaik untuk memahami potensi diri. Dari sudut kota Kuala Lumpur,
              peserta akan membangun kepercayaan diri, memperluas wawasan global, dan pulang membawa misi besar untuk
              Langkat dan Binjai.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="call-to-action" class="call-to-action section accent-background">
      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10 text-center">
            <h3>Kesempatan Ini Tidak Datang Dua Kali!</h3>
            <p>Pendaftaran Batch 1 akan segera ditutup. Jangan lewatkan kesempatan untuk menjadi bagian dari program
              kepemimpinan bertaraf global. Persiapkan dirimu untuk pengalaman luar biasa bersama Langkat-Binjai Future
              Leaders.</p>

            <!-- Countdown -->
            <div id="countdown-cta" class="d-flex justify-content-center gap-4 my-4">
              <div class="text-center">
                <h3 id="cta-days">00</h3>
                <small>Hari</small>
              </div>
              <div class="text-center">
                <h3 id="cta-hours">00</h3>
                <small>Jam</small>
              </div>
              <div class="text-center">
                <h3 id="cta-minutes">00</h3>
                <small>Menit</small>
              </div>
              <div class="text-center">
                <h3 id="cta-seconds">00</h3>
                <small>Detik</small>
              </div>
            </div>

            <!-- CTA Button -->
            <a class="cta-btn" href="{{ route('candidate.dashboard') }}" target="_blank">Daftar Sekarang</a>
          </div>
        </div>
      </div>
    </section>

  </main>

  <footer id="footer" class="footer light-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="https://futureleaders.id" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/fli/fli-logo.svg') }}">
          </a>
          <p>Program Langkat-Binjai Future Leaders diselenggarakan oleh YLFI dan bertujuan mencetak pemimpin muda yang
            berdaya saing global dan berdampak sosial di tahun 2045.</p>
          <div class="social-links d-flex mt-4">
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="mailto:official@futureleaders.id"><i class="bi bi-envelope"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Menu</h4>
          <ul>
            <li><a href="#hero">Beranda</a></li>
            <li><a href="#about">Tentang</a></li>
            <li><a href="#services">Program</a></li>
            <li><a href="#faq">FAQ</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Program</h4>
          <ul>
            <li><a href="#">Local Bootcamp</a></li>
            <li><a href="#">Social Project</a></li>
            <li><a href="#">International Camp</a></li>
            <li><a href="#">Alumni Network</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Kontak</h4>
          <p>Email: official@futureleaders.id</p>
          <p>Website: <a href="https://futureleaders.id">futureleaders.id</a></p>
        </div>
      </div>
    </div>
    <div class="container copyright text-center mt-4">
      <p>© <span>2025</span> <strong class="px-1 sitename">Future Leaders ID</strong> <span>All Rights Reserved</span>
      </p>
      <div class="credits">
        <a href="https://futureleaders.id/">www.futureleaders.id</a>
      </div>
    </div>
  </footer>
@endsection

@push('scripts')
  <script>
    const targetDate = new Date("2025-04-25T23:59:59").getTime();

    function updateCountdown(prefix) {
      const now = new Date().getTime();
      const distance = targetDate - now;

      const d = Math.floor(distance / (1000 * 60 * 60 * 24));
      const h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const s = Math.floor((distance % (1000 * 60)) / 1000);

      if (distance < 0) {
        const container = document.getElementById(`${prefix}-countdown`);
        if (container) {
          container.innerHTML = "<h4>Pendaftaran telah ditutup.</h4>";
        }
        return;
      }

      document.getElementById(`${prefix}-days`).innerText = d < 10 ? '0' + d : d;
      document.getElementById(`${prefix}-hours`).innerText = h < 10 ? '0' + h : h;
      document.getElementById(`${prefix}-minutes`).innerText = m < 10 ? '0' + m : m;
      document.getElementById(`${prefix}-seconds`).innerText = s < 10 ? '0' + s : s;
    }

    setInterval(() => {
      updateCountdown('hero');
      updateCountdown('section');
      updateCountdown('cta');
    }, 1000);
  </script>
@endpush
