@extends('layouts.app')

@section('content')
<section class="py-12">
  <div class="main-container">
    <h2 class="text-3xl font-bold mb-8 text-center">Galeri</h2>

    <!-- Filter Buttons -->
    <div class="flex justify-center flex-wrap gap-4 mb-8">
      <button class="filter-btn px-4 py-2 rounded bg-blue-500 text-white" data-filter="all">Semua</button>
      @foreach($categories as $category)
        <button class="filter-btn px-4 py-2 rounded bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white"
          data-filter="{{ Str::slug($category->name) }}">
          {{ $category->name }}
        </button>
      @endforeach
    </div>

    <!-- Gallery Items -->
    <div class="grid md:grid-cols-3 gap-6" id="gallery-items">
      @foreach($categories as $category)
        @foreach($category->galleries as $gallery)
          <div class="gallery-item block bg-white shadow-md rounded overflow-hidden transition"
            data-category="{{ Str::slug($category->name) }}">
            <a href="{{ route('gallery.show', $gallery->id) }}">
              <img src="{{ asset('storage/' . $gallery->thumbnail) }}" alt="{{ $gallery->title }}"
                class="w-full h-48 object-cover">
              <div class="p-4">
                <h4 class="text-lg font-semibold">{{ $gallery->title }}</h4>
              </div>
            </a>
          </div>
        @endforeach
      @endforeach
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('js/gallery-filter.js') }}"></script>
@endpush
