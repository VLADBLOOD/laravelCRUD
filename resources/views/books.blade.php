@extends('layouts.index')
@section('content')
    <div class="container overflow-hidden">
        <div class="row" style="padding: 10px 0;">
            <div class="col-8">
                <legend>Управление книгами</legend>
            </div>
            <div class="col-4 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" href="/books/add">
                    <i class="fa-solid fa-plus"></i> Добавить книгу
                </a>
            </div>
        </div>
        <div class="row">
            <form>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Название</th>
                        <th scope="col">Год издания</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Кол-во страниц</th>
                        <th scope="col">Администрирование</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <th scope="row">{{$book->id}}</th>
                            <td>{{$book->name}}</td>
                            <td>{{$book->release}}</td>
                            <td>{{$book->ISBN}}</td>
                            <td>{{$book->pages}}</td>
                            <td class="d-grid d-md-flex justify-content-md-end">
                                <a class="btn btn-light me-md-2" href="/books/edit/{{$book->id}}">
                                    <i class="fa-solid fa-pencil"></i> Изменить
                                </a>
                                <a class="btn btn-danger" href="/books/delete/{{$book->id}}">
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
