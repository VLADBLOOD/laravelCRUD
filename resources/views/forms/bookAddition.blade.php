@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="row justify-content-center" style="padding-top: 10px;">
            <div class="col-4">
                <legend>
                @if(!is_null($book))
                    Редактирование книги
                @else
                    Добавление книги
                @endif
                </legend>
                <form
                    @if(!is_null($book))
                    action="/books/update/{{$book->id}}"
                    @else
                    action="/books/add"
                    @endif
                    method="post"
                >
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Название</label>
                        <input type="text" class="form-control" id="name" name="name"
                        @if(!is_null($book))
                            value="{{$book->name}}"
                        @endif
                        >
                    </div>
                    <div class="mb-3">
                        <label for="release" class="form-label">Год издания</label>
                        <input type="number" class="form-control" id="release" name="release"
                        @if(!is_null($book))
                            value="{{$book->release}}"
                        @endif
                        >
                    </div>
                    <div class="mb-3">
                        <label for="ISBN" class="form-label">ISBN</label>
                        <input type="text" class="form-control" id="ISBN" name="ISBN"
                        @if(!is_null($book))
                            value="{{$book->ISBN}}"
                        @endif
                        >
                    </div>
                    <div class="mb-3">
                        <label for="pages" class="form-label">Кол-во страниц</label>
                        <input type="number" class="form-control" id="pages" name="pages"
                        @if(!is_null($book))
                            value="{{$book->pages}}"
                        @endif
                        >
                    </div>
                    <div class="d-grid d-md-flex justify-content-md-end">
                        <a class="btn btn-light me-md-2" href="/books">
                            <i class="fa-solid fa-angle-left"></i> Назад
                        </a>
                        <button class="btn btn-primary" type="submit">
                        @if(!is_null($book))
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
