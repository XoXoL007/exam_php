<?php
$update = isset($actor)
?>

@extends('layouts.app')

@section('content')
        <div class="container border border-info" >
            <div class="mt-1 row">
                <div class="col">
                    <h1 class="text-center">{{$actor->name}}</h1>
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
                    @if($actor->photo_url)
                        <img src="/storage/{{$actor->photo_url}}">
                    @else
                        <img width="200" height="200" src="/storage/photo_actors/no_photo.png">
                    @endif
                </div>
                <div class="col">
                    <p class="text-center">{{$actor->decrypt_info}}</p>
                </div>
            </div>
            <div class="d-flex mb-3 justify-content-center">
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
@endsection
