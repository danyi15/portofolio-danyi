@extends('layouts.app')

@section('content')

{{-- Hero Quote --}}
<section class="bg-gradient-to-r from-blue-100 to-indigo-100 py-20 mb-10">
  <div class="max-w-3xl mx-auto text-center px-4" data-aos="fade-up">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 leading-snug">
      "Membaca satu artikel hari ini bisa mengubah langkahmu esok hari."
    </h2>
    <p class="mt-4 text-gray-600 text-lg">
      Temukan inspirasi, wawasan, dan informasi terkini seputar teknologi, desain, dan produktivitas.
    </p>
  </div>
</section>

{{-- Articles Section --}}
<section class="py-10 bg-white">
  <div class="main-container px-4">
    <h3 class="text-2xl font-semibold mb-6 text-center text-gray-800" data-aos="fade-up">Artikel Terbaru</h3>

    @if($articles->count() === 0)
      <p class="text-center text-gray-500">Belum ada artikel.</p>
    @else
      <div class="grid md:grid-cols-3 gap-8">
        {{-- Artikel besar (artikel pertama) --}}
        @php $first = $articles->first(); @endphp
        <div class="md:col-span-2 bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="100">
          <img src="{{ $first->thumbnail ? asset('storage/' . $first->thumbnail) : 'https://source.unsplash.com/800x400/?technology' }}" alt="{{ $first->title }}" class="w-full h-60 object-cover">
          <div class="p-6">
            <h4 class="text-2xl font-bold text-gray-800 mb-2">{{ $first->title }}</h4>
            <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($first->excerpt ?? $first->content), 120) }}</p>
            <a href="{{ route('articles.show', $first->slug) }}" class="text-blue-500 font-medium hover:underline">Baca Selengkapnya →</a>
          </div>
        </div>

        {{-- Artikel kecil lainnya --}}
        @if($articles->count() > 1)
        <div class="space-y-6">
          @foreach($articles->skip(1) as $article)
          <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-md transition" data-aos="fade-up" data-aos-delay="150">
            <img src="{{ $article->thumbnail ? asset('storage/' . $article->thumbnail) : 'https://source.unsplash.com/400x200/?news' }}" alt="{{ $article->title }}" class="w-full h-36 object-cover">
            <div class="p-4">
              <h5 class="font-semibold text-lg text-gray-800">{{ Str::limit($article->title, 80) }}</h5>
              <p class="text-sm text-gray-600">{{ Str::limit(strip_tags($article->excerpt ?? $article->content), 80) }}</p>
              <a href="{{ route('articles.show', $article->slug) }}" class="text-sm text-blue-500 hover:underline">Baca</a>
            </div>
          </div>
          @endforeach
        </div>
        @endif
      </div>

      {{-- Pagination --}}
      <div class="mt-10 text-center">
        {{ $articles->links() }}
      </div>
    @endif
  </div>
</section>

@endsection
