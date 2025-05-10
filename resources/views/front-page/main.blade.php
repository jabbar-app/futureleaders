<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Meta Title & Description -->
  <title>Langkat-Binjai Future Leaders 2025</title>
  <meta name="description"
    content="Langkat-Binjai Future Leaders adalah program pengembangan calon pemimpin muda Langkat dan Binjai bertaraf global, dengan pengalaman pelatihan di Kuala Lumpur, Malaysia.">
  <meta name="keywords"
    content="Langkat, Binjai, Future Leaders, Program Kepemimpinan, Pemuda, Global Leadership, Malaysia, Kuala Lumpur, YFLI, Pelatihan Anak Muda, Program Gratis, Sosial Project, Bootcamp">

  <!-- SEO & Social Sharing -->
  <meta name="author" content="Future Leaders Indonesia">
  <meta name="robots" content="index, follow">
  <meta property="og:title" content="Langkat-Binjai Future Leaders 2025">
  <meta property="og:description"
    content="Program gratis untuk mencetak pemimpin muda Langkat & Binjai yang siap tampil di kancah global.">
  <meta property="og:image" content="{{ asset('assets/fli/og-lbfl.jpg') }}">
  <meta property="og:url" content="https://futureleaders.id/lbfl">
  <meta property="og:type" content="website">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Langkat-Binjai Future Leaders 2025">
  <meta name="twitter:description"
    content="Ikuti program kepemimpinan pemuda berskala global dengan international camp ke Kuala Lumpur.">
  {{-- <meta name="twitter:image" content="{{ asset('assets/fli/og-lbfl.jpg') }}"> --}}

  <!-- Favicons -->
  <link rel="icon" href="{{ asset('assets/fli/favicon.png') }}" type="image/png">
  {{-- <link rel="apple-touch-icon" href="{{ asset('assets/fli/favicon.png') }}"> --}}

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Inter:wght@400;500;600;700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">

  @stack('styles')
</head>

<body class="index-page">
  @yield('content')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  {{-- <div id="preloader"></div> --}}

  <!-- Vendor JS Files -->
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/validate.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="{{ asset('js/glightbox.min.js') }}"></script>
  <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('js/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

  @stack('scripts')
</body>

</html>
