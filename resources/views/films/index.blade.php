@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center mb-3">
        <a href="{{route('films.create')}}" class="ml-auto btn btn-success">
            Добавить фильм
        </a>
    </div>
    @forelse($films ?? [] as $film)

        @if ($loop->first)
            <div class="container mb-3">
                @endif
                <div class="d-flex p-2 bd-highlight border mb-3 flex-start">
                    <div class="container col-2 mb-1">
                        <a class="h5 text-center" href="{{route('films.show', $film)}}">{{$film->title ?? 'No title'}}</a>
                        @if($film->cover_url)
                            <img width="100px" height="100px" src="/storage/{{$film->cover_url}}">
                        @else
                            <img width="100px" height="100px" src="/storage/movies/cover/no_movie.jpg">
                        @endif
                    </div>
                    <div class="container overflow-hidden">
                        <p class="text-truncate text-left">{{$film->decryption ?? 'Нет описания' }}</p>
                    </div>
                    <div class="container col-3 btn-group align-items-center" >
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
                @if ($loop->last)
            </div>
        @endif


    @empty
        <div class="alert alert-secondary">
            Ничего нет :(
        </div>

    @endforelse
@endsection
