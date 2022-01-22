@extends('layouts.app')

@section('title', $user->name)

@section('description', $user->intro !== null ? substr(strip_tags($user->intro), 0, 400)."..." : $user->name)
@section('image', $user->pic !== null ? asset(Storage::url($user->pic)) : asset('img/saadifoundation-logo.png'))

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">
                {{ __('همکاران بنیاد سعدی') }}
                </a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $user->name }}
                </li>
            </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 text-center">
            <a href="{{ Storage::url($user->pic) }}" target="_blank" download="{{$user->name_en}}.jpg" class="cover">
            <img src="{{ $user->pic !== null ? Storage::url($user->pic) : asset('/img/person.png') }}" alt="" class="w-100 rounded ">
            </a>
            <div class="buttons mt-3">
            @if ($user->resume !== NULL)
                <a href="{{ Storage::url($user->resume) }}" type="button" class="btn btn-success btn-lg btn-block mb-2 btn-sm">
                    <i class="far fa-file"></i>
                    {{ __('دانلود رزومه') }}
                </a>
            @endif
            @if ($user->linkedin_link !== NULL)
                <a href="{{ $user->linkedin_link }}" target="_blank" class="btn btn-primary mb-2">
                    <i class="fab fa-linkedin"></i>
                </a>
            @endif
            @if ($user->website_link !== NULL)
                <a href="{{ $user->website_link }}" target="_blank" class="btn btn-primary mb-2">
                    <i class="fas fa-user-circle"></i>
                </a>
            @endif
            @if ($user->orcid_link !== NULL)
                <a href="{{ $user->orcid_link }}" target="_blank" class="btn btn-primary mb-2">
                    <i class="fab fa-orcid"></i>
                </a>
            @endif
            </div>
        </div>
        @if ($user->intro !== NULL)
            <div class="col-md-8 order-md-2">
                <div class="description font-weight-light mb-4 text-justify">
                    {!! nl2br($user->intro) !!}
                </div>
            </div>
        @endif
    </div>
    @if ($user->books->isNotEmpty())
        <div class="row text-center d-flex justify-content-center border-top mb-4">
            <div class="col-12">
                <h2 class="mb-4 mt-4">
                {{ __('کتاب‌های') }} {{ $user->name }}
                </h2>
            </div>
            @foreach ($user->books as $book)
                <div class="col-6 col-md-3 mb-2">
                    <a href="{{ route('books.show', $book) }}">
                        <div class="card book-card">
                            <img src="{{ $book->cover !== NULL ? Storage::url($book->cover) : asset('img/cover.jpg') }}" class="card-img-top">
                            <div class="card-body">
                                <p class="card-text">
                                    {{ $book->title }}
                                    @foreach ($book->levels as $level)
                                        <div class="mb-1">
                                        <a class="progress" href="{{ route('levels.show', $level) }}">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-level-{{$level->title_abbr}}" role="progressbar" aria-valuenow="{{$level->width}}" 
                                            aria-valuemin="0" aria-valuemax="100" style="width: {{$level->width}}%">
                                            {{ strtoupper($level->title_abbr) }}
                                            </div>
                                        </a>
                                        </div>
                                    @endforeach
                                    @foreach ($book->tags as $tag)
                                        <a href="{{ route('tags.show', $tag) }}">
                                        <span class="badge badge-info">
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