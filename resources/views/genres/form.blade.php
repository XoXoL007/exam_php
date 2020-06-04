<?php
$update = isset($genre)
?>

@extends('layouts.app')

@section('content')

    <h2 class="mb-3">{{ $update ? "Редактировать {$genre->name}" : 'Добавить жанр'}}</h2>

    <div class="card card-body">
        <form action="{{ $update ? route('genres.update', $genre) : route('genres.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($update)
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="name">Название жанра <span class="text-danger">*</span></label>
                <input class="form-control" @error('name') is-invalid @enderror
                type="text"
                       name="name"
                       id="name"
                       placeholder="Введите название жанра..."
                       value="{{old('name') ?? ( $genre->name ?? '')}}">

                @error('name')
                <div class="is-invalid">{{ $message }}</div>
                @enderror
            </div>

            <button type="reset"
                    class="btn btn-danger"
                    onclick="event.preventDefault(); window.history.back()">
                Отмена
            </button>
            <button class="btn btn-success">{{ $update ? 'Обновить' : 'Добавить' }}</button>

        </form>
    </div>
@endsection
