@extends('layouts.app')

    @section('content')

{{-- Start Skill --}}
<section id="skills" class="py-16 bg-white">
  <div class="main-container mx-auto px-4">
    <h1 class="text-center text-sm text-blue-600 uppercase tracking-wider mb-2" data-aos="fade-down">What I Can Do</h1>
    <h2 class="text-3xl font-bold text-center mb-8" data-aos="fade-up">Skills</h2>
    <p class="max-w-2xl mx-auto text-center text-gray-600 mb-10" data-aos="fade-up" data-aos-delay="100">
      Berikut adalah keahlian yang saya miliki di bidang teknologi dan desain.
    </p>

    <div class="grid md:grid-cols-2 gap-6 max-w-4xl mx-auto">
      @php
        $colors = ['bg-red-500', 'bg-blue-500', 'bg-green-500', 'bg-yellow-500', 'bg-purple-500', 'bg-pink-500', 'bg-indigo-500', 'bg-orange-500'];
      @endphp

      @foreach ($skills as $index => $skill)
        @php
          $randomColor = $colors[array_rand($colors)];
        @endphp

        <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
          <div class="bg-white rounded-lg shadow p-4 flex items-center justify-between mb-2">
            <div class="flex items-center gap-3">
              <div class="bg-blue-100 text-blue-600 p-2 rounded-md">
                <i class='bx {{ $skill->icon }} text-xl'></i>
              </div>
              <span class="font-medium text-gray-800">{{ $skill->name }}</span>
            </div>
            <span class="font-semibold text-gray-700">{{ $skill->level }}%</span>
          </div>
          <div class="w-full bg-gray-200 h-1 rounded">
            <div class="{{ $randomColor }} h-1 rounded" style="width: {{ $skill->level }}%"></div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
{{-- End Skill --}}



    <!-- Portfolios -->
<section id="portfolios" class="py-16">
  <div class="main-container mx-auto px-4">
    <h3 class="text-sm text-blue-500 uppercase text-center mb-2 tracking-widest" data-aos="fade-up">My Works</h3>
    <h1 class="text-3xl font-bold text-center mb-10" data-aos="fade-up" data-aos-delay="100">Featured Portfolios</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($projects as $index => $project)
      <div class="bg-white rounded-xl shadow-md hover:shadow-2xl transform hover:scale-105 transition duration-300 p-4 flex flex-col" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
        {{-- <div class="tilt-card bg-white rounded-xl shadow-md p-4 flex flex-col transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}"> --}}

        <!-- Cover Image -->
        <div class="h-48 mb-4 overflow-hidden rounded-md">
          <img src="{{ asset('storage/' . $project->image) }}"
               alt="Thumbnail {{ $project->title }}"
               class="w-full h-full object-cover">
        </div>

        <!-- Title + Link -->
        <div class="flex items-center justify-between mb-2">
          <h4 class="text-lg font-semibold text-gray-800">{{ $project->title }}</h4>
          @if($project->link)
          <a href="{{ $project->link }}" target="_blank" class="text-blue-500 hover:text-blue-700 transition" title="Visit Project">
            <i class="bx bx-link-external text-xl"></i>
          </a>
          @endif
        </div>

        <!-- Tags -->
        <div class="flex flex-wrap gap-2 text-sm mb-3">
          @foreach(explode(',', $project->tech_stack) as $tech)
          <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full font-medium">{{ trim($tech) }}</span>
          @endforeach
        </div>

        <!-- Description -->
        <p class="text-sm text-gray-600 mb-2">{{ $project->description }}</p>

        <!-- Year -->
        <span class="text-xs text-gray-400 mt-auto">Tahun: {{ $project->year }}</span>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- End Portfolios -->


{{-- Education & Experience --}}
<section id="skills" class="py-16 bg-white">
  <div class="main-container mx-auto px-4">
    <h3 class="text-center text-sm text-blue-600 uppercase tracking-wider mb-2" data-aos="fade-down">Learning Path</h3>
    <h1 class="text-center text-3xl font-bold mb-12" data-aos="fade-up">Education & Experience</h1>

    <div class="grid md:grid-cols-2 gap-10 items-start">
      <!-- EDUCATION -->
      <div class="relative pl-6 border-l-2 border-blue-500 pt-6" data-aos="fade-right">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Education</h2>
        @foreach ($educations as $index => $edu)
          <div class="mb-8 relative" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
            <div class="absolute -left-[13px] top-3 w-5 h-5 bg-white border-4 border-blue-500 rounded-full shadow"></div>
            <div class="ml-4">
              <h4 class="text-lg font-semibold text-gray-800 ml-5">{{ $edu->institution }}</h4>
              <p class="text-sm text-gray-600 ml-5">{{ $edu->degree }} - {{ $edu->major }}</p>
              <p class="text-xs text-gray-400 ml-5">{{ $edu->start_year }} - {{ $edu->end_year ?? 'Sekarang' }}</p>
            </div>
          </div>
        @endforeach
      </div>

      <!-- EXPERIENCE -->
      <div class="pt-6" data-aos="fade-left">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Experience</h2>
        @foreach ($experiences as $index => $exp)
          <div
            class="bg-white border border-gray-200 rounded-xl shadow-md p-5 mb-5 hover:shadow-lg transition-all duration-300"
            data-aos="zoom-in-up" data-aos-delay="{{ $index * 100 }}">
            <div class="flex justify-between items-center mb-1">
              <h4 class="text-md font-bold text-gray-800">{{ $exp->position }}</h4>
              <span class="text-xs text-gray-500">
                {{ \Carbon\Carbon::parse($exp->start_date)->format('Y') }} -
                {{ $exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('Y') : 'Sekarang' }}
              </span>
            </div>
            <p class="text-sm text-gray-600 mb-1">{{ $exp->company }}</p>
            <p class="text-sm text-gray-500 leading-relaxed">{{ $exp->description }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

{{-- end edutation & experience --}}

<!-- Organization -->
<section id="organization" class="py-16">
  <div class="main-container mx-auto px-4">
    <h3 class="text-center text-sm text-blue-600 uppercase tracking-wider mb-2" data-aos="fade-down">My Journey</h3>
    <h1 class="text-center text-3xl font-bold mb-12" data-aos="fade-up">Organization</h1>

    <div class="relative pl-6 border-l-2 border-blue-500 max-w-3xl mx-auto">
      @foreach ($organizations as $index => $org)
      <div class="mb-10 relative" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
        <!-- Bullet -->
        <div class="absolute -left-[13px] top-1 w-6 h-6 bg-blue-500 rounded-full border-4 border-white shadow"></div>

        <!-- Card Content -->
        <div class="ml-8">
          <h4 class="text-lg font-semibold text-blue-600">{{ $org->name }}</h4>
          <p class="text-sm text-gray-700">{{ $org->role }}</p>
          <span class="text-xs text-gray-400">
            {{ \Carbon\Carbon::parse($org->start_date)->format('Y') }} -
            {{ $org->end_date ? \Carbon\Carbon::parse($org->end_date)->format('Y') : 'Sekarang' }}
          </span>
          <p class="text-sm text-gray-600 mt-2">{{ $org->description }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>


<!-- Activity -->
<section id="activity" class="mt-16 bg-gray-100 py-16">
  <div class="main-container px-4">
    <h3 class="text-center text-sm text-blue-600 uppercase tracking-wider mb-2" data-aos="fade-down">My Activities</h3>
    <h1 class="section-title text-center mb-10" data-aos="fade-up">Activities & Contributions</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @foreach ($activities as $index => $activity)
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border hover:shadow-xl transition duration-300"
          data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">

          <img
            src="{{ asset('storage/' . $activity->image) }}"
            alt="Activity Image"
            class="w-full max-h-60 mx-auto object-contain"
          />
          <div class="p-4">
            <div class="flex items-center gap-2 mb-2">
              <div class="w-2 h-2 bg-green-500 rounded-full"></div>
              <span class="text-sm text-gray-500 italic">{{ $activity->type }}</span>
            </div>
            <h4 class="text-lg font-semibold text-green-700">{{ $activity->title }}</h4>
            <p class="text-xs text-gray-400 mb-2">
              {{ \Carbon\Carbon::parse($activity->date)->translatedFormat('d F Y') }}
            </p>
            <p class="text-sm text-gray-700">{{ $activity->description }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>



    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 1000,
        once: true
    });
    </script>

    <script>
  VanillaTilt.init(document.querySelectorAll(".tilt-card"), {
    max: 15,          // seberapa miring
    speed: 400,       // kecepatan animasi
    glare: true,      // efek pantulan cahaya
    "max-glare": 0.2, // seberapa terang pantulan
  });
</script>

@endsection
