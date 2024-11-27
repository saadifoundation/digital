@extends('layouts.app')

@section('title', 'امکانات مجازی بنیاد سعدی')

@section('description', __("در این صفحه می‌توانید امکانات مجازی بنیاد سعدی را ببینید. امکاناتی که با هدف آموزش زبان فارسی به غیرفارسی‌زبانان تهیه شده‌اند."))
@section('image', asset('img/saadifoundation-logo.png'))

@section('content')
  <div class="container">
    <div class="row mb-4 text-center">
      <div class="col-12">
        <div class="description font-weight-light">
            <p>
              {{ __('رشد روزافزون فناوری‌های نوین و ارائه خدمات مختلف در محیط مجازی باعث شده‌است که آموزش و یادگیری در فضای مجازی به یک نیاز ضروری در جوامع تبدیل گردد. در سند چشم‌انداز کشور در افق بیست‌ساله نیز، دستیابی به جایگاه برتر علمی در سطح منطقه و خاورمیانه با تأکید بر جنبش نرم‌افزاری و تولید علم تاکید شده‌است. محیط آموزش مجازی یکی از راهکارهای دستیابی به این هدف و بستر حرکت از آموزش‌های سنتی به سمت یادگیری الکترونیکی است.')}}
            </p>
            <p>
            {{__('بخش قابل‌توجهی از مخاطبین اصلی آموزش مجازی زبان فارسی، زبان‌آموزان، استادان و مؤسسه‌هایی هستند که به دلیل عدم هم‌مکانی، پرهزینه‌بودن انتقال استاد یا دانشجو به یک مکان مشترک، به حضور در آموزش مجازی علاقه‌مند هستند، که البته در صورت ارائه آموزش مجازی با کیفیتی مشابه و حتی بالاتر از محیط حضوری و استفاده از امکانات کاربردی آن، به این علاقه افزوده می‌شود. آموزش مجازی در بنیاد سعدی از اهمیت دوچندان برخوردار است زیرا بیشتر مخاطبان آن، فارسی‌آموزانی از سراسر دنیا هستند. لذا مجموعه امکانات آموزش مجازی با هدف گسترش وسیع‌تر، سهل‌تر و غنی‌تر زبان فارسی در بنیاد سعدی طراحی و توسعه یافته‌است. با توجه به نوع مخاطب و محتوای آموزشی، سعی شده با استفاده از جدیدترین رویکردهای آموزشی و فناورانه امکانات متنوعی شناسایی، طراحی و تولید گردد که در این جا به معرفی این امکانات می‌پردازیم.')}}
            </p>
        </div>
        <div class="badges mb-3">
          <a href="#levels-row" class="btn btn-success btn-sm mb-3">
              {{ __('سطوح') }} <span class="badge text-bg-light">{{ $levels->count() }}</span>
          </a>
          <a href="#options-row" class="btn btn-primary btn-sm mb-3">
            {{ __('امکانات') }} <span class="badge text-bg-light">{{ $options->count() }}</span>
          </a>
        </div>
      </div>
    </div>
    @if($levels->isNotEmpty())
      <div class="row text-center border-top mb-3" id="levels-row">
        <div class="col-12">
            <h2 class="mb-4 mt-4">
              {{ __('سطوح استاندارد مرجع بنیاد سعدی') }}
            </h2>
            <p>
            امکانات مجازی بنیاد سعدی در 7 سطح مختلف تهیه می‌شوند. این سطح‌بندی بر اساس
                <a href="https://books.saadifoundation.ir/books/persianstandard" target="_blank">
                    استاندارد مرجع آموزش زبان فارسی
                </a>
                است.
            </p>
        </div>
        <div class="col-12">
            <div class="levels">
                @foreach ($levels as $level)
                    <div class="mb-1">
                        <a class="progress" href="{{route('levels.show', $level)}}">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-level-{{$level->title_abbr}}" role="progressbar" aria-valuenow="{{$level->width}}" 
                            aria-valuemin="0" aria-valuemax="100" style="width: {{$level->width}}%">
                                {{ __("$level->title") }}: {{ strtoupper($level->title_abbr) }}
                            </div>
                        </a>
                    </div> 
                @endforeach
            </div>
        </div>
      </div>
    @endif
    @if($options->isNotEmpty() && $levels->isNotEmpty())
      <div class="row text-center">
        <div class="col-12">
            <h2 class="mb-4 mt-4">
              {{ __('جدول امکانات مجازی بنیاد سعدی') }}
            </h2>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">
                                {{ __('سطح') }} / {{  __('برچسب') }}
                            </th>
                            <th scope="col">
                                {{ __('امکانات') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($levels as $level)
                          <tr>
                            <th scope="row">
                              <div class="mb-1">
                                <a class="progress" href="{{route('levels.show', $level)}}">
                                  <div class="progress-bar progress-bar-striped progress-bar-animated bg-level-{{$level->title_abbr}}" role="progressbar" aria-valuenow="{{$level->width}}" 
                                  aria-valuemin="0" aria-valuemax="100" style="width: {{$level->width}}%">
                                  {{ strtoupper($level->title_abbr)}}
                                  </div>
                                </a>
                                <p>
                                  {{ __($level->title) }}
                                </p>
                              </div>
                            </th>
                            <td>
                              @foreach ($level->options as $option)
                                <a href="{{ route('options.show', $option->title_abbr) }}" class="icon">
                                  <img src="{{ $option->icon !== null ? Storage::url($option->icon) : asset('img/icon.jpg') }}" alt="{{ $option->title }}" title="{{ $option->title }}" class="w-25 mb-3">
                                </a>
                              @endforeach
                            </td>
                          </tr>
                        @endforeach
                        @foreach ($other_options_tags as $other_tag)
                          <tr>
                            <th scope="row">
                              <a href="{{ route('tags.show', $other_tag) }}" class="badge text-bg-info">
                                {{$other_tag->title}}
                              </a>
                            </th>
                            <td>
                              @foreach ($other_tag->options as $option)
                                <a href="{{ route('options.show', $option->title_abbr) }}" class="icon">
                                  <img src="{{ $option->icon !== null ? Storage::url($option->icon) : asset('img/icon.jpg') }}" alt="{{ $option->title }}" title="{{ $option->title }}" class="w-25 mb-3">
                                </a>
                              @endforeach
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    @endif
    @if($options->isNotEmpty() && $options->count() >= 3)
      <div class="row text-center d-flex justify-content-center border-top mb-4" id="options-row">
        <div class="col-12">
          <h2 class="mb-4 mt-4">
              {{ __('بعضی از امکانات مجازی بنیاد سعدی') }}
          </h2>
        </div>
        @foreach ($options->random(3) as $option)
          <div class="col-6 col-md-3 mb-2">
            <a href="{{route('options.show', $option->title_abbr)}}">
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
        <div class="col-12">
            <a class="btn btn-primary btn-block" href="{{ route('options.index') }}">
                {{ __('همۀ امکانات مجازی') }}
              </a>
        </div>
      </div>
    @endif
@endsection