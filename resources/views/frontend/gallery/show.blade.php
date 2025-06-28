@extends('layouts.app')

@section('content')
<section class="py-12">
  <div class="main-container max-w-4xl mx-auto">
    <h2 class="text-3xl font-bold mb-4 center">{{ $gallery->title }}</h2>
    <img src="{{ asset('storage/' . $gallery->cover_image) }}" class="w-full h-64 object-cover rounded mb-6">

  @php
    preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([\w\-]+)/', $gallery->video_url, $matches);
    $youtubeId = $matches[1] ?? null;
  @endphp

@if ($youtubeId)
    <div class="aspect-w-16 aspect-h-9 mb-6">
        <iframe
            class="w-full h-64 rounded"
            src="https://www.youtube.com/embed/{{ $youtubeId }}"
            frameborder="0"
            allowfullscreen
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        ></iframe>
    </div>
@endif

    <div class="prose text-gray-700">
      {!! nl2br(e($gallery->description)) !!}
    </div>


  </div>
</section>
@endsection
