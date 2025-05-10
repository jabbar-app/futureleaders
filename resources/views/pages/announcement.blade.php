<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengumuman Kelulusan TPA - Langkat-Binjai Future Leaders 2025</title>
  <meta name="description"
    content="Daftar peserta yang lolos seleksi Tes Potensi Akademik (TPA) untuk program Langkat-Binjai Future Leaders 2025.">
  <meta name="keywords"
    content="pengumuman, kelulusan, tpa, langkat-binjai future leaders 2025, daftar peserta lolos tpa">
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet">
  <style>
    /* Custom scrollbar for a more modern look (optional) */
    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }

    ::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
      background: #00386B;
      /* lbfl-blue */
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #002649;
      /* lbfl-blue-dark */
    }

    /* Base font */
    body {
      font-family: 'Inter', sans-serif;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      overflow-x: hidden;
      /* Prevent horizontal scroll */
    }

    /* Animation: Fade In Up */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-fadeInUp {
      animation: fadeInUp 0.8s ease-out forwards;
    }

    /* Animation: Fade In */
    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    .animate-fadeIn {
      animation: fadeIn 1s ease-out forwards;
    }

    /* Animation: Scale Up on Hover */
    .hover-scale-up {
      transition: transform 0.3s ease-in-out;
    }

    .hover-scale-up:hover {
      transform: scale(1.03);
    }

    /* Section Title Underline Animation */
    .title-underline {
      position: relative;
      padding-bottom: 1rem;
      /* 16px */
    }

    .title-underline::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 3px;
      /* Increased thickness */
      background-color: #00386B;
      /* lbfl-blue */
      border-radius: 9999px;
      /* rounded-full */
      transition: width 0.5s ease-out;
    }

    .title-underline.animate-underline::after {
      width: 100px;
      /* Target width of the underline */
    }

    /* Staggered list item animation */
    .stagger-children>* {
      opacity: 0;
      transform: translateY(20px);
      animation: fadeInUp 0.5s ease-out forwards;
    }

    /* Header specific styling */
    .header {
      background-color: rgba(255, 255, 255, 0.9);
      /* Slightly transparent white */
      backdrop-filter: blur(10px);
      /* Glassmorphism effect */
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .header.scrolled {
      background-color: rgba(255, 255, 255, 1);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .navmenu ul li a {
      transition: color 0.3s ease, transform 0.2s ease;
      position: relative;
      padding-bottom: 6px;
    }

    .navmenu ul li a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background-color: #00386B;
      /* lbfl-blue */
      transition: width 0.3s ease;
    }

    .navmenu ul li a:hover::after,
    .navmenu ul li a.active::after {
      width: 100%;
    }

    .navmenu ul li a:hover {
      color: #00386B;
      /* lbfl-blue */
    }

    .btn-getstarted {
      transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
    }

    .btn-getstarted:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(0, 56, 107, 0.2);
    }

    /* Table row animation */
    .participant-row {
      opacity: 0;
      transform: translateX(-20px);
      animation: slideInRow 0.5s forwards;
    }

    @keyframes slideInRow {
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    /* Add a class for elements to be animated on scroll */
    .scroll-animate {
      opacity: 0;
      transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }

    .scroll-animate.fade-in-up {
      transform: translateY(50px);
    }

    .scroll-animate.fade-in-left {
      transform: translateX(-50px);
    }

    .scroll-animate.fade-in-right {
      transform: translateX(50px);
    }

    .scroll-animate.is-visible {
      opacity: 1;
      transform: translateY(0) translateX(0);
    }

    /* Card hover effect */
    .info-card {
      transition: transform 0.3s ease-out, box-shadow 0.3s ease-out;
    }

    .info-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 30px rgba(0, 56, 107, 0.15);
    }
  </style>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'lbfl-blue': '#00386B',
            'lbfl-blue-dark': '#002649',
            'lbfl-green': '#28a745', // Kept for icons
            'lbfl-green-dark': '#1e7e34',
            'lbfl-gray-50': '#f9fafb', // Lighter gray
            'lbfl-gray-100': '#f3f4f6',
            'lbfl-gray-200': '#e5e7eb',
            'lbfl-gray-700': '#374151',
            'lbfl-gray-800': '#1f2937',
            'lbfl-gray-900': '#111827', // Darker gray for text
          },
          fontFamily: {
            'inter': ['Inter', 'sans-serif'],
            'roboto': ['Roboto', 'sans-serif'], // Kept if specifically used
          },
          boxShadow: {
            'xl-custom': '0 20px 25px -5px rgba(0, 56, 107, 0.1), 0 10px 10px -5px rgba(0, 56, 107, 0.04)',
            '2xl-custom': '0 25px 50px -12px rgba(0, 56, 107, 0.25)',
          }
        }
      }
    }
  </script>
</head>

<body class="bg-lbfl-gray-50 text-lbfl-gray-900 antialiased">
  <header id="header" class="header fixed top-0 left-0 right-0 z-50 flex items-center">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-20">
      <a href="/" class="logo flex items-center">
        <img src="{{ asset('assets/fli/fli-logo.svg') }}" alt="LBFL Logo" class="h-8 md:h-10">
      </a>

      <nav id="navmenu" class="navmenu hidden lg:flex">
        <ul class="flex space-x-8">
          <li><a href="#hero" class="text-lbfl-gray-700 hover:text-lbfl-blue font-medium active">Home</a></li>
          <li><a href="#announcement" class="text-lbfl-gray-700 hover:text-lbfl-blue font-medium">Pengumuman</a></li>
          <li><a href="#further-info" class="text-lbfl-gray-700 hover:text-lbfl-blue font-medium">Info Lanjut</a></li>
          <li><a href="#contact-info" class="text-lbfl-gray-700 hover:text-lbfl-blue font-medium">Kontak</a></li>
        </ul>
      </nav>

      <a class="btn-getstarted bg-lbfl-blue hover:bg-lbfl-blue-dark text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:shadow-lg hidden lg:inline-flex items-center"
        href="{{ route('home') }}">Daftar Batch 2</a>

      <button id="mobileMenuButton" class="lg:hidden text-lbfl-gray-700 hover:text-lbfl-blue focus:outline-none">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>
    </div>
    <div id="mobileMenu" class="lg:hidden hidden absolute top-20 left-0 right-0 bg-white shadow-lg py-4">
      <ul class="flex flex-col items-center space-y-4">
        <li><a href="#hero" class="text-lbfl-gray-700 hover:text-lbfl-blue font-medium active block py-2">Home</a>
        </li>
        <li><a href="#announcement"
            class="text-lbfl-gray-700 hover:text-lbfl-blue font-medium block py-2">Pengumuman</a></li>
        <li><a href="#further-info" class="text-lbfl-gray-700 hover:text-lbfl-blue font-medium block py-2">Info
            Lanjut</a></li>
        <li><a href="#contact-info" class="text-lbfl-gray-700 hover:text-lbfl-blue font-medium block py-2">Kontak</a>
        </li>
        <li><a
            class="btn-getstarted bg-lbfl-blue hover:bg-lbfl-blue-dark text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:shadow-lg inline-flex items-center mt-2"
            href="{{ route('home') }}">Daftar Batch 2</a></li>
      </ul>
    </div>
  </header>

  <main class="pt-20">
    <section id="hero" class="bg-cover bg-center py-32 md:py-48 text-white relative"
      style="background-image: linear-gradient(rgba(0, 56, 107, 0.8), rgba(0, 34, 65, 0.9)), url('https://images.unsplash.com/photo-1566914447826-bf04e54bf1be?q=80&w=3131&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-6 leading-tight tracking-tight animate-fadeInUp"
          style="animation-delay: 0.2s;">
          Pengumuman Kelulusan Seleksi TPA
        </h1>
        <p class="text-xl sm:text-2xl md:text-3xl font-roboto opacity-90 animate-fadeInUp"
          style="animation-delay: 0.4s;">
          Langkat-Binjai Future Leaders 2025
        </p>
      </div>
    </section>

    <section id="announcement" class="py-16 md:py-24 bg-lbfl-gray-50">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 md:mb-20 scroll-animate fade-in-up">
          <h2 class="text-3xl sm:text-4xl font-bold text-lbfl-gray-900 mb-4 title-underline">
            Daftar Peserta Lolos Seleksi TPA
          </h2>
          <p class="text-lg text-lbfl-gray-700 mt-8 max-w-3xl mx-auto leading-relaxed">
            Selamat kepada para peserta yang telah berhasil lolos tahap Seleksi Tes Potensi Akademik (TPA) Program
            Langkat-Binjai Future Leaders 2025! Berikut adalah daftar nama peserta yang dinyatakan lolos:
          </p>
        </div>

        <div class="mb-10 max-w-2xl mx-auto scroll-animate fade-in-up" style="animation-delay: 0.2s;">
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="h-5 w-5 text-lbfl-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                  clip-rule="evenodd" />
              </svg>
            </div>
            <input type="text" id="searchInput" onkeyup="filterTableParticipants()"
              placeholder="Cari berdasarkan Nama atau Nomor Registrasi..."
              class="w-full px-4 py-3.5 pl-12 border border-lbfl-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-lbfl-blue focus:border-lbfl-blue transition duration-150 ease-in-out text-lbfl-gray-700 placeholder-lbfl-gray-500"
              aria-label="Cari Peserta">
          </div>
        </div>

        <div class="overflow-x-auto bg-white shadow-xl-custom rounded-xl scroll-animate fade-in-up"
          style="animation-delay: 0.4s;">
          <table class="min-w-full divide-y divide-lbfl-gray-200" id="participantsTable">
            <thead class="bg-gradient-to-r from-lbfl-blue to-lbfl-blue-dark">
              <tr>
                <th scope="col"
                  class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">No.</th>
                <th scope="col"
                  class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Nomor Registrasi
                </th>
                <th scope="col"
                  class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Nama Lengkap
                  Peserta</th>
              </tr>
            </thead>
            <!-- Table container -->
            <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-lbfl-gray-200">
                <thead class="bg-lbfl-gray-50">
                  <tr>
                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-lbfl-gray-500 uppercase tracking-wider">No
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-lbfl-gray-500 uppercase tracking-wider">
                      Registration</th>
                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-lbfl-gray-500 uppercase tracking-wider">Name
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-lbfl-gray-200" id="participantTableBody">
                  <!-- Table rows will be generated by JavaScript -->
                </tbody>
              </table>
            </div>

            <script>
              // Participant data array
              const participants = [
                "Ali Yusuf",
                "Muhammad Bintang Athalarik",
                "M. Syahputra",
                "Rafael Michadeo",
                "Muafi Zuhra",
                "Wulan Maysarah Br Sirait",
                "Feby Calista Rasyada",
                "Safitri",
                "Fadia Yusra",
                "Aisyah Zalfaa Ar Rahma",
                "Ade Fania Ramadhani",
                "Abid Al Abiyyu Putra",
                "Farhan Ardyansyah",
                "Nafa Dwi Fadhilah Nasution",
                "Aisyah Nurcahyani",
                "Arni Fatul Mubarokah",
                "Muthia Halida Zahra",
                "Raka Rafzan Rasyid",
                "Ananda Salsabila Khairi",
                "Dumayanti Batubara",
                "M. Tife Sultan",
                "Nabila",
                "Dhea Reista Mawangi",
                "M. Nafis Sulthan",
                "Vanny Rizky Amelia",
                "Muhammad Latiful Fatih",
                "Zaqi Asshiddiqy",
                "Fanny Abdi Atika Hani",
                "Irdina Mastura",
                "Firda Yulia",
                "Sella Angel Lika Br Siagian",
                "Nisya Aulia",
                "Nurul Amaliah",
                "Rina Maisyah",
                "Tania Akira Silangit"
              ];

              // Function to generate table rows
              function generateParticipantTable() {
                const tableBody = document.getElementById('participantTableBody');

                // Clear any existing rows
                tableBody.innerHTML = '';

                // Registration number base (static part)
                const regBase = "LBFL2025-";
                // Starting registration number (5-digit number)
                let regStartNumber = 20001;
                let countNumber = 314;

                // Generate table rows
                participants.forEach((name, index) => {
                  // Create row element
                  const row = document.createElement('tr');
                  row.className = 'hover:bg-lbfl-gray-100 transition duration-150 ease-in-out participant-row';
                  row.style.animationDelay = `${index * 0.05}s`;

                  // Registration number (static pattern with incrementing number)
                  const regNumber = `${regBase}${regStartNumber + index * countNumber}`;

                  // Create row HTML
                  row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-lbfl-gray-800">${index + 1}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-lbfl-gray-700 participant-reg">${regNumber}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-lbfl-gray-700 participant-name">${name}</td>
                    `;

                  // Add row to table
                  tableBody.appendChild(row);
                });

                // Add no results row (hidden by default)
                const noResultsRow = document.createElement('tr');
                noResultsRow.id = 'noResultsFound';
                noResultsRow.style.display = 'none';
                noResultsRow.setAttribute('role', 'status');
                noResultsRow.setAttribute('aria-live', 'polite');
                noResultsRow.innerHTML = `
                    <td colspan="3" class="px-6 py-10 whitespace-nowrap text-sm text-center text-lbfl-gray-700 italic">
                    Tidak ada data peserta yang cocok dengan pencarian Anda.
                    </td>
                `;
                tableBody.appendChild(noResultsRow);
              }

              // Generate table on page load
              document.addEventListener('DOMContentLoaded', generateParticipantTable);
            </script>
          </table>
        </div>
      </div>
    </section>

    <section id="further-info" class="py-16 md:py-24 bg-white">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 md:mb-20 scroll-animate fade-in-up">
          <h2 class="text-3xl sm:text-4xl font-bold text-lbfl-gray-900 mb-4 title-underline">
            Informasi Lebih Lanjut
          </h2>
        </div>
        <div
          class="max-w-3xl mx-auto bg-lbfl-gray-50 p-8 sm:p-10 rounded-xl shadow-xl-custom info-card scroll-animate fade-in-up"
          style="animation-delay: 0.2s;">
          <p class="text-lg text-lbfl-gray-700 mb-8 leading-relaxed">
            Selamat bagi nama-nama yang tercantum di atas! Tinggal 2 tahap lagi nih: Leadership Project & Interview. Jadi, langkah kamu selanjutnya adalah mempersiapkan
            diri untuk tahap berikutnya.
          </p>
          <h3 class="text-2xl font-semibold text-lbfl-blue mb-6">Tahapan Berikutnya:</h3>
          <ul class="space-y-5 text-lbfl-gray-700 stagger-children">
            <li class="flex items-start" style="animation-delay: 0.3s;">
              <svg class="flex-shrink-0 h-7 w-7 text-lbfl-green mr-4 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="text-base leading-relaxed"><strong class="font-semibold">Konfirmasi Pendaftaran:</strong>
                <p>
                  Peserta diwajibkan melakukan konfirmasi pendaftaran melalui tautan yang ada di Dashboard masing-masing, maksimal hari Sabtu, 10 Mei 2025 pukul 23.59 WIB.
                  <strong>Bagi peserta yang tidak melakukan konfirmasi, akan dianggap mengundurkan diri.</strong>
                </p>
                <p>
                  <a href="{{ route('dashboard') }}"
                    class="mt-2 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Login ke Dashboard</a>
                </p>
              </span>
            </li>
            <li class="flex items-start" style="animation-delay: 0.4s;">
              <svg class="flex-shrink-0 h-7 w-7 text-lbfl-green mr-4 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="text-base leading-relaxed"><strong class="font-semibold">Mengikuti Sesi On-boarding
                  Leadership Project (Rencana Kontribusi):</strong>
                <p>
                  Peserta yang telah melakukan konfirmasi akan mengikuti On-boarding melalui Zoom yang akan dilaksanakan pada hari Minggu, 11 Mei 2025 pukul 20.30 WIB. Link Zoom akan
                  dikirimkan melalui email setelah konfirmasi pendaftaran berhasil. Dalam On-boarding ini, peserta akan
                  mendapatkan pengarahan mengenai penyusunan Leadership Project.
                </p>
              </span>
            </li>
            <li class="flex items-start" style="animation-delay: 0.5s;">
              <svg class="flex-shrink-0 h-7 w-7 text-lbfl-green mr-4 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="text-base leading-relaxed"><strong class="font-semibold">Presentasi Akhir:</strong> Peserta
                akan mempresentasikan Leadership Project yang telah disusun di hadapan tim penilai.</span>
            </li>
            <li class="flex items-start" style="animation-delay: 0.5s;">
              <svg class="flex-shrink-0 h-7 w-7 text-lbfl-green mr-4 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="text-base leading-relaxed"><strong class="font-semibold">Wawancara & Pengumuman Peserta
                  Terpilih:</strong> Peserta yang lolos tahap presentasi akan mengikuti wawancara. Pengumuman peserta
                terpilih akan diumumkan setelah seluruh rangkaian wawancara selesai.</span>
            </li>
          </ul>
          <p class="mt-10 text-lbfl-gray-700 leading-relaxed" style="animation-delay: 0.6s;">
            Kami menghargai antusiasme dan partisipasi seluruh pendaftar Langkat-Binjai Future Leaders 2025. Bagi yang
            belum berhasil, jangan berkecil hati. Teruslah berusaha dan kembangkan diri Anda. Sampai jumpa di kesempatan
            lainnya!
          </p>
        </div>
      </div>
    </section>

    <section id="contact-info" class="py-16 md:py-24 bg-lbfl-gray-100">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="mb-12 md:mb-16 scroll-animate fade-in-up">
          <h2 class="text-3xl sm:text-4xl font-bold text-lbfl-gray-900 mb-4 title-underline">
            Hubungi Kami
          </h2>
        </div>
        <p class="text-lg text-lbfl-gray-700 mb-10 max-w-2xl mx-auto leading-relaxed scroll-animate fade-in-up"
          style="animation-delay: 0.2s;">
          Jika ada pertanyaan lebih lanjut mengenai pengumuman ini atau tahapan selanjutnya, jangan ragu untuk
          menghubungi tim panitia Langkat-Binjai Future Leaders 2025.
        </p>
        <div
          class="flex flex-col sm:flex-row justify-center items-center space-y-5 sm:space-y-0 sm:space-x-6 scroll-animate fade-in-up"
          style="animation-delay: 0.4s;">
          <a href="mailto:info@futureleaders.id?subject=Pertanyaan%20LBFL%202025"
            class="inline-flex items-center justify-center px-8 py-3.5 border border-transparent text-base font-semibold rounded-lg text-white bg-lbfl-blue hover:bg-lbfl-blue-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lbfl-blue transition-all duration-200 ease-in-out shadow-md hover:shadow-lg hover:-translate-y-1 transform">
            <svg class="w-5 h-5 mr-2.5 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
              fill="currentColor" aria-hidden="true">
              <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
              <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
            </svg>
            Email Panitia
          </a>
          <a href="https://wa.me/6281234567890?text=Halo%20Panitia%20LBFL%202025" target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center justify-center px-8 py-3.5 border border-transparent text-base font-semibold rounded-lg text-white bg-lbfl-green hover:bg-lbfl-green-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lbfl-green transition-all duration-200 ease-in-out shadow-md hover:shadow-lg hover:-translate-y-1 transform">
            <svg class="w-5 h-5 mr-2.5 -ml-1" fill="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M18.425 5.575C16.442 3.592 13.808 2.5 11.075 2.5C5.575 2.5 1.075 7 1.075 12.5C1.075 14.542 1.658 16.458 2.675 18.067L1.5 22.5L6.125 21.342C7.675 22.217 9.433 22.667 11.233 22.667H11.258C16.758 22.667 21.258 18.167 21.258 12.667C21.258 9.933 20.208 7.358 18.425 5.575ZM11.258 20.833H11.242C9.692 20.833 8.167 20.417 6.833 19.625L6.467 19.4L3.258 20.258L4.125 17.125L3.908 16.733C3.033 15.283 2.575 13.658 2.575 11.999C2.575 7.832 6.408 3.999 11.075 3.999C13.492 3.999 15.742 4.941 17.442 6.641C19.142 8.341 20.083 10.591 20.083 12.999C20.083 17.666 16.25 21.499 11.583 21.499L11.258 20.833V20.833ZM15.925 14.408C15.667 14.275 14.592 13.742 14.358 13.65C14.125 13.558 13.958 13.517 13.792 13.783C13.625 14.05 13.142 14.625 12.958 14.833C12.775 15.042 12.592 15.067 12.333 14.933C12.075 14.8 11.075 14.458 9.892 13.425C9.017 12.642 8.45 11.7 8.258 11.408C8.067 11.117 8.2 10.992 8.35 10.842C8.483 10.708 8.642 10.5 8.792 10.333C8.942 10.167 8.992 10.042 9.125 9.775C9.258 9.508 9.192 9.283 9.108 9.108C9.025 8.933 8.542 7.742 8.342 7.25C8.15 6.775 7.958 6.817 7.825 6.808C7.708 6.808 7.542 6.808 7.375 6.808C7.208 6.808 6.925 6.875 6.683 7.142C6.442 7.408 5.817 7.983 5.817 9.125C5.817 10.267 6.708 11.358 6.833 11.525C6.958 11.692 8.542 14.092 10.858 15.017C13.175 15.942 13.175 15.6 13.467 15.558C13.758 15.517 14.833 14.942 15.042 14.675C15.25 14.408 15.25 14.183 15.192 14.05C15.133 13.917 14.983 13.833 14.725 13.7Z" />
            </svg>
            WhatsApp Panitia
          </a>
        </div>
      </div>
    </section>
  </main>

  <footer class="bg-lbfl-blue-dark text-lbfl-gray-200 py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <p class="text-sm">&copy; <span id="currentYear"></span> Langkat-Binjai Future Leaders. All rights reserved.</p>
      <p class="text-xs mt-2 opacity-75">Designed with <span class="text-red-400">&hearts;</span> for the next
        generation of leaders.</p>
    </div>
  </footer>


  <script>
    // Function to filter table participants (original function kept)
    function filterTableParticipants() {
      let input, filter, table, tr, tdName, tdReg, i, nameTxtValue, regTxtValue, visibleCount = 0;
      input = document.getElementById("searchInput");
      table = document.getElementById("participantsTable");
      let noResultsRow = document.getElementById("noResultsFound");

      if (!input || !table || !noResultsRow) {
        return;
      }

      filter = input.value.toUpperCase();
      tr = table.getElementsByClassName("participant-row");

      for (i = 0; i < tr.length; i++) {
        if (tr[i]) {
          tdReg = tr[i].getElementsByClassName("participant-reg")[0];
          tdName = tr[i].getElementsByClassName("participant-name")[0];

          if (tdName || tdReg) {
            nameTxtValue = tdName ? (tdName.textContent || tdName.innerText) : "";
            regTxtValue = tdReg ? (tdReg.textContent || tdReg.innerText) : "";

            if (nameTxtValue.toUpperCase().indexOf(filter) > -1 || regTxtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
              tr[i].style.opacity = "0"; // For re-triggering animation if needed
              tr[i].style.transform = "translateX(-20px)";
              // Re-apply animation with a slight delay to ensure it's visible
              setTimeout(() => {
                tr[i].style.opacity = "1";
                tr[i].style.transform = "translateX(0)";
              }, 50 * (i % 10)); // Stagger animation slightly
              visibleCount++;
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      }

      if (visibleCount === 0 && filter !== "") {
        noResultsRow.style.display = "table-row";
      } else {
        noResultsRow.style.display = "none";
      }
    }

    // Scroll-triggered animations
    document.addEventListener('DOMContentLoaded', () => {
      const scrollAnimateElements = document.querySelectorAll('.scroll-animate');
      const titleUnderlines = document.querySelectorAll('.title-underline');
      const participantRows = document.querySelectorAll('#participantsTable .participant-row');
      const header = document.getElementById('header');
      const mobileMenuButton = document.getElementById('mobileMenuButton');
      const mobileMenu = document.getElementById('mobileMenu');

      // Header scroll effect
      window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
          header.classList.add('scrolled');
        } else {
          header.classList.remove('scrolled');
        }
      });

      // Mobile menu toggle
      if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
          mobileMenu.classList.toggle('hidden');
        });
      }


      const observerOptions = {
        root: null, // relative to document viewport
        rootMargin: '0px',
        threshold: 0.1 // 10% of item is visible
      };

      const observerCallback = (entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            if (entry.target.classList.contains('title-underline')) {
              entry.target.classList.add('animate-underline');
            } else {
              // Determine animation type from class
              if (entry.target.classList.contains('fade-in-up')) {
                entry.target.classList.add('is-visible', 'fade-in-up');
              } else if (entry.target.classList.contains('fade-in-left')) {
                entry.target.classList.add('is-visible', 'fade-in-left');
              } else if (entry.target.classList.contains('fade-in-right')) {
                entry.target.classList.add('is-visible', 'fade-in-right');
              } else {
                entry.target.classList.add('is-visible'); // Default fade-in
              }
            }
            observer.unobserve(entry.target); // Optional: Animate only once
          }
        });
      };

      const scrollObserver = new IntersectionObserver(observerCallback, observerOptions);

      scrollAnimateElements.forEach(el => scrollObserver.observe(el));
      titleUnderlines.forEach(el => scrollObserver.observe(el));

      // Stagger animation for initially visible participant rows
      const tableObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            participantRows.forEach((row, index) => {
              // Apply animation with stagger if not already animated by filter
              if (row.style.display !== 'none') { // only animate visible rows
                row.style.animationDelay = `${index * 0.05}s`; // Stagger by 50ms
                row.classList.add(
                  'slideInRow-observed'); // Add a class to prevent re-animation by filter if not needed
              }
            });
            observer.unobserve(entry.target); // Stop observing after initial animation
          }
        });
      }, {
        threshold: 0.1
      });

      const tableElement = document.getElementById('participantsTable');
      if (tableElement) {
        tableObserver.observe(tableElement);
      }

      // Set current year in footer
      document.getElementById('currentYear').textContent = new Date().getFullYear();

      // Smooth scroll for nav links
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
          e.preventDefault();
          const targetId = this.getAttribute('href');
          const targetElement = document.querySelector(targetId);
          if (targetElement) {
            // Calculate offset for fixed header
            const headerOffset = document.getElementById('header').offsetHeight || 80;
            const elementPosition = targetElement.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

            window.scrollTo({
              top: offsetPosition,
              behavior: "smooth"
            });

            // Close mobile menu if open
            if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
              mobileMenu.classList.add('hidden');
            }

            // Update active link
            document.querySelectorAll('#navmenu ul li a, #mobileMenu ul li a').forEach(link => link.classList
              .remove('active'));
            this.classList.add('active');
            // Also update the corresponding link in the other menu if it exists
            const otherMenuLink = document.querySelector(
              `#navmenu a[href="${targetId}"], #mobileMenu a[href="${targetId}"]`);
            if (otherMenuLink && otherMenuLink !== this) otherMenuLink.classList.add('active');
          }
        });
      });

    });
  </script>
</body>

</html>
