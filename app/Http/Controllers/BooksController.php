<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Helpers\Notifications;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function showBooksPanel()
    {
        return view('books')->with(['books' => Book::all()]);
    }

    public function displayBookAddition($id = null)
    {
        return view("forms.bookAddition")->with([
            'book' => is_null($id) ? null : Book::getByID($id)
        ]);
    }

    public function addBook(Request $request)
    {
        Book::addNewAuthor($request);
        return Notifications::successMessage('Книга добавлена');
    }

    public function deleteBook($id)
    {
        Book::deleteAuthorByID($id);
        return Notifications::successMessage('Книга удалена');
    }

    public function updateBook($id, Request $request)
    {
        Book::updateByID($id, $request);
        return Notifications::successMessage('Книга обновлена');
    }
}
