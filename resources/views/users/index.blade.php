@extends('layouts.app')

@section('title', __('همۀ همکاران بنیاد سعدی'))

@section('description', __("در این صفحه می‌توانید همکاران تهیه‌کنندۀ امکانات آموزش مجازی بنیاد سعدی را ببینید. امکاناتی که با هدف آموزش زبان فارسی به غیرفارسی‌زبانان تهیه شده‌اند."))
@section('image', asset('img/saadifoundation-logo.png'))

@section('content')

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('index') }}">
            {{ __('صفحۀ اصلی') }}
            </a></li>
            <li class="breadcrumb-item active" aria-current="page">
            {{ __('همکاران') }}
            </li>
        </ol>
        </nav>
    </div>
</div>
<div class="row mb-4 text-center d-flex justify-content-center">
    <div class="col-12">
        <div class="description font-weight-light">
            <p>
            در مجموع تاکنون
            {{ $users->count() }}
            فرد یا مؤسسه در تهیۀ امکانات مجازی با بنیاد سعدی همکاری کرده‌اند.
            </p>
        </div>
    </div>
    @foreach ($users->sortBy('name') as $user)
        @if($user->books->isNotEmpty())
            <div class="col-6 col-md-3 person">
                <a href="{{ route('users.show', $user) }}">
                <figure class="figure text-center">
                    <img src="{{ $user->pic !== NULL ? Storage::url($user->pic) : asset('/img/person.png') }}" alt="{{ $user->name }}" class="w-50 rounded figure-img img-fluid">
                    <figcaption class="figure-caption text-center">
                    {{ $user->name }}
                    </figcaption>
                </figure>
                </a>
            </div>
        @endif
    @endforeach
</div>
@endsection