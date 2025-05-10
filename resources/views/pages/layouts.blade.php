<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'Kanvas Bakat')</title>

  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
  {{-- <link rel="manifest" href="{{ asset('site.webmanifest') }}"> --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Nunito+Sans:wght@300;400;600;700;800&display=swap"
    rel="stylesheet">

  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <style type="text/tailwindcss">
    @layer base {
      html {
        font-family: 'Poppins', 'Nunito Sans', sans-serif;
        scroll-behavior: smooth;
      }
    }

    @layer utilities {
      .scroll-behavior-smooth {
        scroll-behavior: smooth;
      }
    }
  </style>
  @stack('styles')

  <script>
    if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia(
        '(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark');
    } else {
      document.documentElement.classList.remove('dark');
    }

    function toggleTheme() {
      if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
      } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
      }
    }
  </script>

</head>

<body class="bg-gray-50 dark:bg-slate-900 text-gray-800 dark:text-gray-200 antialiased leading-normal tracking-normal">

  <div id="app">
    <main>
      @yield('content')
    </main>
  </div>

  @stack('scripts')

</body>

</html>
