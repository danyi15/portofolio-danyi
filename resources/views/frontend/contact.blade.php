@extends('layouts.app')

@section('content')
<section class="py-16 bg-white-50">
  <div class="main-container max-w-5xl mx-auto px-4">

    <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Hubungi Saya</h2>

    {{-- Sosial Media --}}
    <div class="text-center mb-10">
      <p class="mb-2 text-gray-600">Temui saya di media sosial:</p>
      <div class="flex justify-center gap-4 text-2xl">
            <a href="https://www.instagram.com/danyl_go" target="_blank" class="text-gray-600 hover:text-pink-500 transition">
           <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24">
            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.337 3.608 1.312.976.975 1.25 2.242 1.312 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.337 2.633-1.312 3.608-.975.976-2.242 1.25-3.608 1.312-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.337-3.608-1.312-.976-.975-1.25-2.242-1.312-3.608C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.85c.062-1.366.337-2.633 1.312-3.608C4.52 2.5 5.787 2.225 7.153 2.163c1.266-.058 1.646-.07 4.85-.07zM12 0C8.741 0 8.333.014 7.053.072 2.696.271.275 2.693.075 7.05.014 8.33 0 8.741 0 12c0 3.259.014 3.667.072 4.947.2 4.357 2.621 6.779 6.978 6.979 1.281.059 1.69.073 4.95.073s3.667-.014 4.947-.072c4.357-.2 6.779-2.621 6.979-6.978.059-1.281.073-1.69.073-4.95s-.014-3.667-.072-4.947C23.725 2.694 21.304.273 16.947.073 15.667.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324A6.162 6.162 0 0 0 12 5.838zm0 10.162a3.999 3.999 0 1 1 0-8 3.999 3.999 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.88 1.44 1.44 0 0 0 0-2.88z"/>
        </svg>
            </a>
            <a href="https://www.linkedin.com/in/danyi-aprizal-31047323b" target="_blank" class="text-gray-600 hover:text-blue-600 transition">
            <!-- SVG LinkedIn -->        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current" viewBox="0 0 24 24">
            <path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5S0.02 4.881 0.02 3.5C0.02 2.119 1.13 1 2.5 1s2.48 1.119 2.48 2.5zM0 8h5v16H0V8zm7.982 0h4.968v2.205h.071c.692-1.309 2.384-2.683 4.908-2.683C21.406 7.522 24 9.637 24 14.378V24h-5v-8.364c0-1.996-.036-4.567-2.782-4.567-2.785 0-3.211 2.176-3.211 4.422V24H8v-16z"/>
        </svg></a>
            <a href="https://github.com/danyi15" target="_blank" class="text-gray-600 hover:text-black transition">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24">
            <path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.438 9.8 8.207 11.386.599.111.793-.26.793-.577v-2.234c-3.338.726-4.033-1.415-4.033-1.415-.546-1.386-1.333-1.756-1.333-1.756-1.089-.744.084-.729.084-.729 1.205.084 1.839 1.238 1.839 1.238 1.07 1.835 2.807 1.305 3.492.998.107-.776.418-1.306.762-1.605-2.665-.305-5.466-1.334-5.466-5.931 0-1.31.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.403 1.02.004 2.047.137 3.006.403 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.243 2.874.119 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.824 1.102.824 2.222v3.293c0 .319.192.694.801.576C20.565 21.796 24 17.299 24 12c0-6.63-5.373-12-12-12z"/>
        </svg>
            </a>
      </div>
    </div>

    {{-- Flash message --}}
    @if(session('success'))
      <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-6 text-center">
        {{ session('success') }}
      </div>
    @endif

    {{-- Formulir Kontak --}}

   <!-- Contact -->
<section id="contact" class="bg-white-100 py-16">
  <div class="main-container px-4 mx-auto max-w-7xl">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
      <!-- Contact Form -->
      <form action="https://formspree.io/f/xrbgprvw" method="POST" class="bg-white p-6 rounded-lg shadow-lg space-y-4">
        <input type="text" name="name" placeholder="Nama Anda" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>

        <input type="email" name="email" placeholder="Email Aktif" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>

        <textarea name="message" rows="5" placeholder="Tulis pesan Anda..." class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-300">
          Kirim Pesan
        </button>
      </form>

      <!-- Contact Info -->
      <div class="space-y-6">
        <div class="flex items-start gap-4">
          <div class="bg-blue-100 p-3 rounded-full">
            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 1c-3.148 0-6 2.553-6 5.702 0 3.148 2.602 6.907 6 12.298 3.398-5.391 6-9.15 6-12.298 0-3.149-2.851-5.702-6-5.702zM12 9c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2z"/>
            </svg>
          </div>
          <div>
            <h4 class="font-semibold text-gray-700">Alamat</h4>
            <p class="text-gray-600">Tanjungpinang, Kepulauan Riau</p>
          </div>
        </div>

        <div class="flex items-start gap-4">
          <div class="bg-blue-100 p-3 rounded-full">
            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
              <path d="M20 22.621l-3.521-6.795c-.008.004-1.974.97-2.064 1.011-2.24 1.086-6.799-7.82-4.609-8.994l2.083-1.026-3.493-6.817-2.106 1.039c-7.202 3.755 4.233 25.982 11.6 22.615.121-.055 2.102-1.029 2.11-1.033z"/>
            </svg>
          </div>
          <div>
            <h4 class="font-semibold text-gray-700">Telepon</h4>
            <p class="text-gray-600">(62) 82179003688</p>
          </div>
        </div>

        <div class="flex items-start gap-4">
          <div class="bg-blue-100 p-3 rounded-full">
            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
              <path d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z"/>
            </svg>
          </div>
          <div>
            <h4 class="font-semibold text-gray-700">Email</h4>
            <p class="text-gray-600">danylaprizal3@gmail.com</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Contact -->
    {{-- Estimasi Service Fee (optional) --}}
    <div class="mt-16">
      <h3 class="text-xl font-semibold mb-4">Service Fee</h3>
      <p class="mb-4 text-gray-600">Silakan hubungi saya untuk layanan seperti web development, design, dan konsultasi digital.</p>
      <ul class="grid md:grid-cols-3 gap-6">
        <li class="bg-white border-l-4 border-blue-500 p-4 rounded shadow-sm">
          <h4 class="font-bold text-lg">Landing Page</h4>
          <p class="text-gray-600">Mulai dari <span class="text-blue-500 font-semibold">Rp 500.000</span></p>
        </li>
        <li class="bg-white border-l-4 border-green-500 p-4 rounded shadow-sm">
          <h4 class="font-bold text-lg">Full Website</h4>
          <p class="text-gray-600">Mulai dari <span class="text-green-500 font-semibold">Rp 2.000.000</span></p>
        </li>
        <li class="bg-white border-l-4 border-purple-500 p-4 rounded shadow-sm">
          <h4 class="font-bold text-lg">Konsultasi</h4>
          <p class="text-gray-600">Gratis sesi pertama!</p>
        </li>
      </ul>
    </div>

  </div>
</section>
@endsection
