@extends('layouts.app')

@section('title', __('سطح').' '.__($level->title))

@section('description', $level->intro !== null ? substr(strip_tags($level->intro), 0, 400)."..." : $level->title)
@section('image', asset('img/saadifoundation-logo.png'))

@section('content')
  <div class="row">
    <div class="col-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('index') }}">
            {{ __('سطوح بنیاد سعدی') }}
          </a></li>
          <li class="breadcrumb-item active" aria-current="page">
            {{__('سطح') }} {{__($level->title)}}
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-12">
      <div class="badges mb-3 text-right">
        <a href="#options-row" class="btn btn-primary btn-sm mb-3">
          {{ __('امکانات سطح') }} <span class="badge text-bg-light">{{$level->options->count() }}</span>
        </a>
      </div>
      <div class="description text-right font-weight-light">
          <p>
              {{ __($level->intro) }}
          </p>
      </div>
      <div class="levels">
        @foreach ($levels as $each_level)
            <div class="mb-1">
                <a class="progress" href="{{route('levels.show', $each_level)}}">
                    <div class="progress-bar progress-bar-striped progress-bar-animated @if($level->title_abbr == $each_level->title_abbr) bg-level-{{$each_level->title_abbr}} @else bg-secondary @endif" role="progressbar" aria-valuenow="{{$each_level->width}}" 
                    aria-valuemin="0" aria-valuemax="100" style="width: {{$each_level->width}}%">
                        {{ __("$each_level->title") }}: {{ strtoupper($each_level->title_abbr) }}
                    </div>
                </a>
            </div> 
        @endforeach
      </div>
    </div>
  </div>
  @if ($level->options->isNotEmpty())
    <div class="row text-center d-flex justify-content-center border-top mb-4" id="options-row">
      <div class="col-12">
        <h2 class="mb-4 mt-4">
          {{ __('امکانات مجازی سطح') }}
        </h2>
      </div>
      @foreach ($level->options as $option)
        <div class="col-6 col-md-3 mb-2">
          <a href="{{ route('options.show', $option->title_abbr) }}">
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
  @endif
@endsection