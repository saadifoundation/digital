@extends('layouts.app')

@section ('title', $option->title)

@section('description', $option->intro !== null ? substr(strip_tags($option->intro), 0, 400)."..." : $option->title)
@section('image', $option->icon !== null ? asset(Storage::url($option->icon)) : asset('img/saadifoundation-logo.png'))

@section('content')
  <div class="row">
    <div class="col-12">
      <nav aria-label="breadcrumb" class="border-top border-level-a">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ route('options.index') }}">
              {{ __('امکانات بنیاد سعدی') }}
            </a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            {{ $option->title }}
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-md-4">
      <a href="{{ $option->icon !== null ? Storage::url($option->icon) : asset('img/icon.jpg') }}" target="_blank" download="{{$option->title_abbr}}.jpg" class="icon container-image-with-badge">
          <img src="{{ $option->icon !== null ? Storage::url($option->icon) : asset('img/icon.jpg') }}" alt="{{ $option->title }}" class="w-100 rounded">
      </a>

      <div class="border-md-1 text-center">
        <div class="buttons mt-3">
          @if($option->main_link !== NULL)
            <a href="{{ $option->main_link }}" target="_blank">
              <img src="{{ asset('img/buttons/01_elearning.png') }}" alt="" class="w-75">
            </a>
          @endif
          @if($option->sample_file !== NULL)
            <a href="{{ Storage::url($option->sample_file) }}" target="_blank">
              <img src="{{ asset('img/buttons/04_Sample.png') }}" alt="" class="w-75">
            </a>
          @endif
        </div>
      </div>

    </div>
    <div class="col-md-8">

      @if($option->intro_video !== NULL)
        <div class="video my-3">
          <div class="h_iframe-aparat_embed_frame">
            <span style="display: block;padding-top: 57%">
            </span>
            <iframe src="https://www.aparat.com/video/video/embed/videohash/{{$option->intro_video}}/vt/frame" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true">
            </iframe>
          </div>
          <p class="caption">
            {{ __('ویدئوی معرفی امکان') }}
          </p>
        </div>
      @endif

      @if ( $option->tags->isNotEmpty() )
        <div class="labels mb-3 text-right mb-4">
          @foreach($option->tags as $tag)
            <a class="badge badge-info" href="{{ route('tags.show', $tag) }}">
              {{ $tag->title }}
            </a>
          @endforeach
        </div>
      @endif
      
      @if($option->intro !== NULL)
        <div class="description font-weight-light mb-4 text-justify">
            {!! $option->intro !!}
        </div>
      @endif

      @if ($option->levels->isNotEmpty())
        <div class="levels mb-4">
          @foreach ($levels as $level)
            <div class="mb-1">
                <a class="progress" href="{{route('levels.show', $level)}}">
                    <div class="progress-bar progress-bar-striped progress-bar-animated @if($option->levels->pluck('title_abbr')->contains($level->title_abbr)) bg-level-{{$level->title_abbr}} @else bg-secondary @endif" role="progressbar" aria-valuenow="{{$level->width}}" 
                    aria-valuemin="0" aria-valuemax="100" style="width: {{$level->width}}%">
                        {{ __("$level->title") }}: {{ strtoupper($level->title_abbr) }}
                    </div>
                </a>
            </div> 
          @endforeach
        </div>
      @endif

    </div>
  </div>
@endsection
