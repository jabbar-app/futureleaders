@props(['endDate'])

@if ($endDate)
  @php
    $timestamp = \Carbon\Carbon::parse($endDate)->timestamp * 1000;
  @endphp

  <div id="countdown-container" class="alert alert-info mb-4">
    Pendaftaran ditutup dalam: <span id="countdown" class="fw-bold text-danger"></span>
  </div>

  <div id="closed-alert" class="alert alert-warning d-none mb-4">
    <strong>Pendaftaran telah ditutup.</strong><br>
    Terima kasih atas minat dan partisipasinya!
  </div>

  @push('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const countdownElement = document.getElementById('countdown');
        const countdownContainer = document.getElementById('countdown-container');
        const closedAlert = document.getElementById('closed-alert');
        const formCard = document.getElementById('form-card');

        const deadline = {{ $timestamp }};

        const updateCountdown = () => {
          const now = new Date().getTime();
          const distance = deadline - now;
          window.isRegistrationClosed = distance <= 0;

          if (distance <= 0) {
            countdownContainer?.classList.add('d-none');
            closedAlert?.classList.remove('d-none');
            formCard?.classList.add('d-none');
            return;
          }

          const days = Math.floor(distance / (1000 * 60 * 60 * 24));
          const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          const seconds = Math.floor((distance % (1000 * 60)) / 1000);

          countdownElement.innerHTML = `${days} hari ${hours} jam ${minutes} menit ${seconds} detik`;
        };

        updateCountdown();
        setInterval(updateCountdown, 1000);
      });
    </script>
  @endpush
@endif
