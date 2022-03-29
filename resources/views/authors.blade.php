@extends('layouts.index')
@section('content')
    <div class="container overflow-hidden">
        <div class="row" style="padding: 10px 0;">
            <div class="col-8">
                <legend>Управление авторами</legend>
            </div>
            <div class="col-4 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" href="/authors/add">
                    <i class="fa-solid fa-plus"></i> Добавить автора
                </a>
            </div>
        </div>
        <div class="row">
            <form>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Фамилия</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Отчество</th>
                        <th scope="col">Администрирование</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($authors as $author)
                        <tr>
                            <th scope="row">{{$author->id}}</th>
                            <td>{{$author->surname}}</td>
                            <td>{{$author->name}}</td>
                            <td>{{$author->patronymic}}</td>
                            <td class="d-grid d-md-flex justify-content-md-end">
                                <a class="btn btn-light me-md-2" href="/authors/edit/{{$author->id}}">
                                    <i class="fa-solid fa-pencil"></i> Изменить
                                </a>
                                <a class="btn btn-danger" href="/authors/delete/{{$author->id}}">
                                    <i class="fa-solid fa-trash"></i> Удалить
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection
