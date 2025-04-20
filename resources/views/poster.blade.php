<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Langkat Future Leaders</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    body {
      padding: 2rem;
      background-color: #f8f9fa;
    }

    .image-preview {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .caption-box {
      background-color: #fff;
      padding: 1rem;
      border-radius: 8px;
      border: 1px solid #dee2e6;
    }
  </style>
</head>

<body>

  <div class="container p-md-4">
    <h2 class="mb-4">Langkat-Binjai Future Leaders 2025</h2>
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center gap-4 mb-4">
          <a href="{{ asset('assets/images/poster.png') }}"
            download="{{ asset('assets/images/poster.png') }}" class="btn btn-primary w-100 text-nowrap">
            Unduh Poster
          </a>
          <button class="btn btn-primary w-100 text-nowrap" onclick="copyCaption()">Copy Caption</button>
        </div>
      </div>
      <div class="col-md-6">
        <img src="{{ asset('assets/images/poster.png') }}" alt="Langkat-Binjai Future Leaders"
          class="image-preview mb-3" id="mainImage">
      </div>
      <div class="col-md-6">

        <div class="caption-box mb-3">
          <p id="captionText">
            🌍 <strong>*LANGKAT-BINJAI FUTURE LEADERS 2025*</strong><br>
            ✈️ <em>3 Hari 2 Malam di Kuala Lumpur, Malaysia</em><br><br>
            Kesempatan emas buat kamu, anak muda asal Langkat & Binjai yang punya mimpi besar, semangat
            kontribusi, dan ingin memiliki pengalaman global.<br><br>

            📌 *Program ini akan membekali kamu dengan:*<br>
            ✅ Leadership Training<br>
            ✅ Project Management & Public Speaking<br>
            ✅ Mentoring dari praktisi<br>
            ✅ Cultural Exchange di Malaysia<br>
            ✅ Sertifikat + Alumni Network Nasional<br><br>

            <strong>*FULLY FUNDED*</strong> – Seluruh biaya ditanggung oleh YFLI<br>
            📅 *International Camp:* 16–18 Agustus 2025 <br>
            📍 *Lokasi:* Kuala Lumpur, Malaysia <br><br>

            🎯 *Kriteria:* <br>
            - Usia 17–24 tahun <br>
            - Memiliki KTP Langkat atau Binjai <br>
            - Berkomitmen mengikuti seluruh tahapan <br><br>

            🚀 *Daftar sekarang:* https://futureleaders.id/<br><br>

            Selengkapnya kamu bisa baca Panduan Pendaftarannya di: https://futureleaders.id/guidebook/ <br><br>
            #LangkatFutureLeaders #FutureLeadersIndonesia #GoGlobal
          </p>
        </div>
      </div>
    </div>
  </div>

  <script>
    function copyCaption() {
      const caption = document.getElementById("captionText").innerText;
      navigator.clipboard.writeText(caption).then(() => {
        alert("Caption berhasil disalin!");
      });
    }
  </script>

</body>

</html>
