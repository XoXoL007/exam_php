@extends('layouts.app')

@section('content')

    <h2 class="mb-3">Добавить фильм</h2>

    <div class="card card-body">

        <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Заголовок<span class="text-danger">*</span></label>
                <input class="form-control @error('title') is-invalid @enderror"
                       type="text"
                       name="title"
                       id="title"
                       placeholder="Заголовок..."
                       value="{{ old('title')  ?? '' }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="cover_url">Обложка</label>
                <input class="form-control-file"
                       type="file"
                       name="cover_url"
                       id="cover_url"
                       accept="image/*"
                       value="{{old('cover_url') ?? ($film->cover_url ?? '')}}">
            </div>

            <div class="form-group">
                <label for="decryption">Описание</label>
                <textarea  placeholder="Описание..."
                           class="form-control"
                           name="decryption"
                           id="decryption">{{ old('decryption') ?? ($film->decryption ?? '')}} </textarea>
            </div>

            <div class="form-group">
                <label for="trailer_url">Трейлер</label>
                <input class="form-control-file"
                       type="file"
                       name="trailer_url"
                       id="trailer_url"
                       accept="video/*"
                       value="{{old('trailer_url') ?? ($film->trailer_url ?? '')}}">
            </div>

            <div class="form-group">
                <label for="film_url">Фильм</label>
                <input class="form-control-file"
                       type="file"
                       name="film_url"
                       id="film_url"
                       accept="video/*"
                       value="{{old('film_url') ?? ($film->film_url ?? '')}}">
            </div>

            <div class="form-group">
                <label for="quality_id">Качество фильма</label>
                <select name="quality_id"
                        id="quality_id"
                        class="form-control">
                    @foreach(App\Quality::listQuality() as $key => $value)
                        <option @if(($film->quality_id ?? '') == $value || old('quality_id') == $key) selected @endif value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('quality_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="release_year_id">Год выхода</label>
                <select name="release_year_id"
                        id="release_year_id"
                        class="form-control">
                    @foreach(App\ReleaseYear::listYear() as $key => $value)
                        <option @if(($film->release_year_id ?? '') == $value || old('release_year_id') == $key) selected @endif value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('release_year_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="actors[]">Актёры</label>
                <select
                    name="actors[]"
                    id="actors[]"
                    class="form-control"
                    >
                    @foreach($actors as $actor)
                        <option value="{{$actor->id}}">{{$actor->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="genres[]">Жанр</label>
                <select
                    name="genres[]"
                    id="genres[]"
                    class="form-control">
                    @foreach($genres as $genre)
                        <option value="{{$genre->id}}">{{$genre->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="reset"
                    class="btn btn-outline-secondary"
                    onclick="event.preventDefault(); window.history.back()">
                Отмена
            </button>
            <button class="btn btn-success">Добавить</button>

        </form>

    </div>

@endsection
