@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="row justify-content-center" style="padding-top: 10px;">
            <div class="col-4">
                <legend>
                    @if(!is_null($author))
                        Редактирование автора
                    @else
                        Добавление автора
                    @endif
                </legend>
                <form
                    @if(!is_null($author))
                    action="/authors/update/{{$author->id}}"
                    @else
                    action="/authors/add"
                    @endif
                    method="post"
                >
                    @csrf
                    <div class="mb-3">
                        <label for="surname" class="form-label">Фамилия</label>
                        <input type="text" class="form-control" id="surname" name="surname"
                        @if(!is_null($author))
                            value="{{$author->surname}}"
                        @endif
                        >
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="name" name="name"
                        @if(!is_null($author))
                            value="{{$author->name}}"
                        @endif
                        >
                    </div>
                    <div class="mb-3">
                        <label for="patronymic" class="form-label">Отчество</label>
                        <input type="text" class="form-control" id="patronymic" name="patronymic"
                        @if(!is_null($author))
                            value="{{$author->patronymic}}"
                        @endif
                        >
                    </div>
                    <div class="d-grid d-md-flex justify-content-md-end">
                        <a class="btn btn-light me-md-2" href="/authors">
                            <i class="fa-solid fa-angle-left"></i> Назад
                        </a>

                        <button class="btn btn-primary" type="submit">
                            @if(!is_null($author))
                                Изменить
                            @else
                                Добавить
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
