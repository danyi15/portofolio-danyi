<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Danyi Aprizal - Software Engineer</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/responsive.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    <style>
      #particles-js {
        position: fixed;
        top: 0;
        left: 0;
        z-index: -1;
        width: 100%;
        height: 100%;
        background-color: #ffffff;
      }

      body {
        position: relative;
        z-index: 1;
      }
    </style>
  </head>
  <body class="flex flex-col min-h-screen">
    <div id="particles-js"></div>

    {{-- Navbar tampil di semua halaman kecuali home --}}
    @if (!request()->is('/'))
        @include('partials.navbar')
    @endif

    {{-- Header hanya untuk halaman home --}}
    @if (request()->is('/'))
        @include('partials.header')
    @endif

    {{-- Konten --}}
    @yield('content')

    {{-- Footer --}}
    @include('partials.footer')


    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        particlesJS("particles-js", {
          particles: {
            number: { value: 60, density: { enable: true, value_area: 800 } },
            color: { value: "#3E8EDE" },
            shape: { type: "circle" },
            opacity: { value: 0.3 },
            size: { value: 3, random: true },
            line_linked: {
              enable: true,
              distance: 150,
              color: "#3E8EDE",
              opacity: 0.4,
              width: 1
            },
            move: { enable: true, speed: 2, out_mode: "out" }
          },
          interactivity: {
            events: {
              onhover: { enable: true, mode: "repulse" },
              onclick: { enable: true, mode: "push" }
            },
            modes: {
              repulse: { distance: 100, duration: 0.4 },
              push: { particles_nb: 4 }
            }
          },
          retina_detect: true
        });
      });
    </script>

<!-- External Libraries -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Navbar scroll effect
    const nav = document.getElementById('mainNav');
    if (nav) {
      window.addEventListener('scroll', () => {
        nav.classList.toggle('show', window.scrollY > 100);
      });
    }

    // Burger menu
    const burger = document.getElementById('burger');
    const navMenu = document.getElementById('nav-menu');
    if (burger && navMenu) {
      burger.addEventListener('click', function () {
        navMenu.classList.toggle('nav-active');
        burger.classList.toggle('toggle-burger');
      });
    }

    // Typed.js
    const typedEl = document.getElementById('typed-title');
    @if (isset($biodata))
    if (typedEl) {
      new Typed("#typed-title", {
        strings: [@json($biodata->title)],
        typeSpeed: 60,
        backSpeed: 40,
        backDelay: 2000,
        loop: true,
        showCursor: true,
        cursorChar: '|',
      });
    }
    @endif

    // AOS
    AOS.init();

    // Gallery Filter
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterButtons.forEach(button => {
      button.addEventListener('click', () => {
        const filter = button.getAttribute('data-filter');

        galleryItems.forEach(item => {
          const itemCategory = item.getAttribute('data-category');
          if (filter === 'all' || itemCategory === filter) {
            item.classList.remove('hidden');
          } else {
            item.classList.add('hidden');
          }
        });

        // Highlight active button
        filterButtons.forEach(btn => btn.classList.remove('bg-blue-500', 'text-white'));
        button.classList.add('bg-blue-500', 'text-white');
      });
    });

  });
</script>

@stack('scripts')


  </body>
</html>

