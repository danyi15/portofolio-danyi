@extends('layouts.app')

@section('content')
<section class="py-12">
  <div class="main-container max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>
   
    @if ($article->video_url)
      <div class="mb-6 aspect-w-16 aspect-h-9">
        <iframe
          class="w-full h-64 rounded"
          src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::afterLast($article->video_url, 'v=') }}"
          title="YouTube video"
          frameborder="0"
          allowfullscreen
        ></iframe>
      </div>
    @elseif ($article->cover_image)
      <img src="{{ asset('storage/' . $article->cover_image) }}" alt="{{ $article->title }}" class="w-full h-64 object-cover mb-6 rounded">
    @endif

    <div class="text-gray-700 leading-relaxed prose max-w-none">
      {!! $article->content !!}
    </div>
  </div>
</section>
@endsection
