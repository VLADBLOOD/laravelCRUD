@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="row justify-content-center" style="padding-top: 10px;">
            <div class="col-4">
                <legend>
                    @if(is_null($alreadyUsed))
                        Добавить в библиотеку
                    @else
                        Редактирование книги
                    @endif
                </legend>
                <form
                    @if(is_null($alreadyUsed))
                    action="/library/add"
                    @else
                    action="/library/update/{{$alreadyUsed['book_id']}}"
                    @endif
                    method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="book_id" class="form-label">Выберите книгу</label>
                        <select id="book_id" name="book_id" class="form-select" aria-label="Default select lib">
                            @foreach($books as $book)
                                <option
                                    @if(!is_null($alreadyUsed) && $book->id == $alreadyUsed['book_id'])
                                    selected
                                    @endif
                                    value="{{$book->id}}">{{$book->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="author_ids" class="form-label">Выберите авторов</label>
                        <select id="author_ids" name="author_id[]" class="form-select" multiple
                                aria-label="multiple select example">
                            @foreach($authors as $author)
                                <option
                                    @if(!is_null($alreadyUsed) && in_array($author->id,$alreadyUsed['authors']))
                                    selected
                                    @endif
                                    value="{{$author->id}}">{{$author->getFIO()}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid d-md-flex justify-content-md-end">
                        <a class="btn btn-light me-md-2" href="/library">
                            <i class="fa-solid fa-angle-left"></i> Назад
                        </a>
                        <button class="btn btn-primary" type="submit">
                            @if(is_null($alreadyUsed))
                                Добавить
                            @else
                                Изменить
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
