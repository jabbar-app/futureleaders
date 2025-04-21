<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Reminder Pendaftaran YFLI 2025</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
  <p>Halo {{ $user->name }},</p>

  <p>
    Terima kasih telah bergabung di platform YFLI 2025. Kami melihat kamu sudah memiliki akun, tapi proses pendaftaranmu
    sebagai calon peserta <strong>belum sepenuhnya selesai</strong>.
  </p>

  <p>
    Jangan lewatkan kesempatan untuk menjadi bagian dari program kepemudaan inspiratif ini!
    Yuk, segera lengkapi data pendaftaranmu sebelum batas waktu berakhir.
  </p>

  <p style="margin: 30px 0;">
    <a href="{{ route('candidate.create') }}"
      style="background-color: #e63946; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">
      Lengkapi Pendaftaran Sekarang
    </a>
  </p>

  <p>
    Jika kamu merasa sudah mengisi data, kamu juga bisa mengecek kembali melalui halaman dashboard pendaftaran.
  </p>

  <p>
    Tetap semangat, dan mari bersama menjadi bagian dari perubahan positif untuk Langkat & Binjai!
  </p>

  <p style="margin-top: 40px;">
    Salam hangat,<br>
    <strong>Panitia YFLI 2025</strong><br>
    <small>Langkat-Binjai Future Leaders</small>
  </p>
</body>

</html>
