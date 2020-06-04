<?php
$update = isset($actor);
?>

@extends('layouts.app')

@section('content')

    <h2 class="mb-3">{{ $update ? "Редактировать {$actor->name}" : 'Добавить актёра'}}</h2>

    <div class="card card-body">
        <form action="{{ $update ? route('actors.update', $actor) : route('actors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($update)
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="name">Имя актёра <span class="text-danger">*</span></label>
                <input class="form-control" @error('name') is-invalid @enderror
                       type="text"
                       name="name"
                       id="name"
                       placeholder="Введите имя актёра..."
                       value="{{old('name') ?? ( $actor->name ?? '')}}">

                @error('name')
                    <div class="is-invalid">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="photo_url">Фото актёра</label>
                <input class="form-control-file"
                       type="file"
                       name="photo_url"
                       id="photo_url"
                       accept="image/*"
                       value="{{old('photo_url') ?? ($actor->photo_url ?? '')}}">
            </div>


            <div class="form-group">
                <label for="decryption">Описание актёра</label>
                <input class="form-control"
                        type="text"
                        name="decrypt_info"
                        id="decrypt_info"
                        placeholder="Введите описание..."
                        value="{{old('decrypt_info') ?? ($actor->decrypt_info ?? '')}}">
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
