@extends('layouts.app')

@section('content')

    <div class="d-flex align-items-center mb-3">
        <a href="{{route('genres.create')}}" class="ml-auto btn btn-success">
            Добавить жанр
        </a>
    </div>

    @forelse($genres as $genre)

        @if($loop->first)
            <div class="container">
                <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Количество записей</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                    <tbody>
        @endif
                    <tr>
                        <td><a class="text-center text-info" href="#">{{$genre->name}}</a></td>
                        <td><p class="text text-center">Количество : </p></td>
                        <td>
                            <form  action="{{ route('genres.destroy', $genre) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                @can('update', $genre)
                                    <a class="btn btn-info" href="{{ route('genres.edit', $genre) }}">
                                        Редактировать
                                    </a>
                                @endcan
                                <button class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
        @if($loop->last)
                    </tbody>
                </table>
            </div>
        @endif

        @empty
            <div class="alert alert-secondary">
                Ничего нет :(
            </div>
    @endforelse
        </div>
@endsection
