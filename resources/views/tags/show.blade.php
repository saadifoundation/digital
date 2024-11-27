@extends('layouts.app')

@section('title', __('برچسب').' '.__($tag->title))

@section('description', $tag->intro !== null ? substr(strip_tags($tag->intro), 0, 400)."..." : $tag->title)
@section('image', asset('img/saadifoundation-logo.png'))

@section('content')
    <div class="row">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('index') }}">
                {{ __('صفحۀ اصلی') }}
              </a></li>
              <li class="breadcrumb-item active" aria-current="page">
                {{ __('برچسب') }} {{ __($tag->title) }}
              </li>
            </ol>
          </nav>
        </div>
    </div>
    <div class="row text-center d-flex justify-content-center border-top mb-4" id="options-row">
        <div class="col-12">
          <h2 class="mb-4 mt-4">
            {{ __('امکانات مجازی') }} {{$tag->title}}
          </h2>
          <div class="alert alert-primary" role="alert">
            تاکنون
            <span class="badge text-bg-light">{{ $tag->options->count() }}</span>
            امکان مجازی با برچسب
            <span class="badge text-bg-info">
                {{$tag->title}}
            </span>
            در بنیاد سعدی تهیه شده است.
          </div>
        </div>
        @foreach ($tag->options as $option)
            <div class="col-6 col-md-3 mb-2">
            <a href="{{ route('options.show', $option) }}">
              <div class="card option-card">
                  <img src="{{ $option->icon !== NULL ? Storage::url($option->icon) : asset('img/icon.jpg') }}" class="card-img-top">
                  <div class="card-body">
                      <p class="card-text">
                          {{ $option->title }}
                          @foreach ($option->levels as $level)
                            <div class="mb-1">
                              <a class="progress" href="{{ route('levels.show', $level) }}">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-level-{{$level->title_abbr}}" role="progressbar" aria-valuenow="{{$level->width}}" 
                                aria-valuemin="0" aria-valuemax="100" style="width: {{$level->width}}%">
                                  {{ strtoupper($level->title_abbr) }}
                                </div>
                              </a>
                            </div>
                          @endforeach
                          @foreach ($option->tags as $tag)
                            <a href="{{ route('tags.show', $tag) }}">
                              <span class="badge text-bg-info">
                                {{ $tag->title }}
                              </span>
                            </a>
                          @endforeach
                      </p>
                  </div>
              </div>
            </a>
            </div>
        @endforeach

    </div>
@endsection
