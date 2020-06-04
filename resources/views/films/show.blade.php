@extends('layouts.app')

@section('content')

    <div class="container border border-info" >
        <div class="mt-1 row">
            <div class="col">
                <h1 class="text-center">{{$film->title}}</h1>
            </div>
            <div class="col-1">
                <button class="btn btn-primary"
                        type="reset"
                        onclick="event.preventDefault(); window.history.back()">
                    Назад
                </button>
            </div>
        </div>


        <div class="container row">
            <div class="col-2">
                @if($film->cover_url)
                    <img src="/storage/{{$film->cover_url}}">
                @else
                    <img width="200" height="200" src="/storage/movies/cover/no_photo.jpg">
                @endif
            </div>
            <div class="col">
                @if($film->decryption)
                <p class="text-center">{{$film->decryption}}</p>
                @else
                <p class="text-center text-danger font-weight-bold">Описания нет</p>
                @endif
            </div>
        </div>
        <div class="container ml-5">
            <p class="text-info font-weight-bold m-1 pl-5">Качество видео: {{$film->quality_id}}</p>
            <br>
            <p class="text-info font-weight-bold m-1 pl-5">Год выхода: {{$film->release_year_id}}</p>
        </div>
        @if($film->trailer_url)
        <div class="container my-4 mb-4 d-flex flex-column align-items-center">
            <h3 class="vjs-control-text">Просмотр трейлера: {{$film->trailer_url}}</h3>
            <video
                width="640"
                height="320"
                controls
            >
                <source src="storage\{{$film->trailer_url}}" type="video/mp4">
            </video>
        </div>
        @endif
        <div class="container my-4 mb-4 d-flex flex-column align-items-center">
            <h3 class="vjs-control-text">Просмотр видео: {{$film->title}}</h3>
            <video
               width="640"
               height="320"
               controls
                >
                <source src="storage\{{$film->film_url}}" type="video/mp4">
            </video>
        </div>
        <div class="d-flex mb-3 justify-content-center">
            <form  action="{{ route('films.destroy', $film) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('update', $film)
                    <a class="btn btn-info" href="{{ route('films.edit', $film) }}">
                        Редактировать
                    </a>
                @endcan
                <button class="btn btn-danger">
                    Удалить
                </button>
            </form>
        </div>
    </div>
@endsection
