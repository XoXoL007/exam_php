@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center mb-3">
        <a href="{{route('actors.create')}}" class="ml-auto btn btn-success">
            Добавить актёра
        </a>
    </div>
    @forelse($actors ?? [] as $actor)

        @if ($loop->first)
            <div class="container mb-3">
        @endif
                <div class="d-flex p-2 bd-highlight border mb-3 flex-start">
                    <div class="container col-3 mb-1">
                        <a class="h5 text-center" href="{{route('actors.show', $actor)}}">{{$actor->name ?? '<p> No name'}}</a>
                        @if($actor->photo_url)
                            <img width="100px" height="100px" src="/storage/{{$actor->photo_url}}">
                        @else
                            <img width="100px" height="100px" src="/storage/photo_actors/no_photo.png">
                        @endif
                    </div>
                    <div class="container overflow-hidden">
                        <p class="text-truncate text-left">{{$actor->decrypt_info ?? 'Нет описания' }}</p>
                    </div>
                    <div class="container col-3 btn-group align-items-center" >
                        <form  action="{{ route('actors.destroy', $actor) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            @can('update', $actor)
                                <a class="btn btn-info" href="{{ route('actors.edit', $actor) }}">
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
