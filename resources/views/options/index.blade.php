@extends('layouts.app')

@section('title', __('همۀ امکانات مجازی بنیاد سعدی'))

@section('description', __("در این صفحه می‌توانید امکانات مجازی بنیاد سعدی را ببینید. امکاناتی که با هدف آموزش زبان فارسی به غیرفارسی‌زبانان تهیه شده‌اند."))
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
                {{ __('امکانات') }}
              </li>
            </ol>
          </nav>
        </div>
    </div>
    <div class="row mb-4 text-center d-flex justify-content-center">
        <div class="col-12">
          <div class="description font-weight-light">
            <p>
              {{ __('رشد روزافزون فناوری‌های نوین و ارائه خدمات مختلف در محیط مجازی باعث شده‌است که آموزش و یادگیری در فضای مجازی به یک نیاز ضروری در جوامع تبدیل گردد. در سند چشم‌انداز کشور در افق بیست‌ساله نیز، دستیابی به جایگاه برتر علمی در سطح منطقه و خاورمیانه با تأکید بر جنبش نرم‌افزاری و تولید علم تاکید شده‌است. محیط آموزش مجازی یکی از راهکارهای دستیابی به این هدف و بستر حرکت از آموزش‌های سنتی به سمت یادگیری الکترونیکی است.')}}
            </p>
            <p>
            {{__('بخش قابل‌توجهی از مخاطبین اصلی آموزش مجازی زبان فارسی، زبان‌آموزان، استادان و مؤسسه‌هایی هستند که به دلیل عدم هم‌مکانی، پرهزینه‌بودن انتقال استاد یا دانشجو به یک مکان مشترک، به حضور در آموزش مجازی علاقه‌مند هستند، که البته در صورت ارائه آموزش مجازی با کیفیتی مشابه و حتی بالاتر از محیط حضوری و استفاده از امکانات کاربردی آن، به این علاقه افزوده می‌شود. آموزش مجازی در بنیاد سعدی از اهمیت دوچندان برخوردار است زیرا بیشتر مخاطبان آن، فارسی‌آموزانی از سراسر دنیا هستند. لذا مجموعه امکانات آموزش مجازی با هدف گسترش وسیع‌تر، سهل‌تر و غنی‌تر زبان فارسی در بنیاد سعدی طراحی و توسعه یافته‌است. با توجه به نوع مخاطب و محتوای آموزشی، سعی شده با استفاده از جدیدترین رویکردهای آموزشی و فناورانه امکانات متنوعی شناسایی، طراحی و تولید گردد که در این جا به معرفی این امکانات می‌پردازیم.')}}
            </p>
          </div>
        </div>
        @foreach ($options as $option)
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