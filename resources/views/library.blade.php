@extends('layouts.index')
@section('content')
    <div class="container overflow-hidden">
        <div class="row" style="padding: 10px 0;">
            <div class="col-8">
                <legend>Управление библиотекой</legend>
            </div>
            <div class="col-4 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" href="/library/add">
                    <i class="fa-solid fa-plus"></i> Добавить книгу в библиотеку
                </a>
            </div>
        </div>
        <div class="row">
            <form>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Название книги</th>
                        <th scope="col">Автор(ы)</th>
                        <th scope="col">Администрирование</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($libData as $key=>$book)
                        <tr>
                            <td>{{$book['bookName']}}</td>
                            <td>
                                <ul>
                                    @foreach($book['authors'] as $author)
                                        <li>{{$author}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="d-grid d-md-flex justify-content-md-end">
                                <a class="btn btn-light me-md-2" href="/library/edit/{{$key}}">
                                    <i class="fa-solid fa-pencil"></i> Изменить
                                </a>
                                <a class="btn btn-danger" href="/library/delete/{{$key}}">
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
