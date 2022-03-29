<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Models\Book;
use App\Models\Author;
use App\Helpers\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class LibraryController extends Controller
{
    public function showLibraryPanel()
    {
        return view('library')->with(['libData' => self::dataToView()]);
    }

    public function displayLibraryAddition($id = null)
    {
        if (!is_null($id)) {
            $alreadyUsed = [
                'authors' => Library::getAuthorsFromBook($id),
                'book_id' => $id
            ];
        }

        return view("forms.libraryAddition")->with([
            'books' => Book::all(),
            'authors' => Author::all(),
            'alreadyUsed' => is_null($id) ? null : $alreadyUsed
        ]);
    }

    public function addToLibrary(Request $request)
    {
        foreach ($request->author_id as $authorID) {
            Library::addNew($request->book_id, $authorID);
        }

        return Notifications::successMessage('Книга добавлена в библиотеку');
    }

    public function deleteFromLib($id)
    {
        Library::deleteBook($id);
        return Notifications::successMessage('Книга удалена из библиотеки');
    }

    public function updateLibrary(Request $request)
    {
        Library::updateBook($request, self::parseBookID());
        return Notifications::successMessage('Книга обновлена');
    }

    private function dataToView()
    {
        $libraryData = array();

        foreach (Library::getBooksGroup() as $key => $bookGroup) {
            $libraryData[$key]['bookName'] = Book::getByID($key)->getBookName();
            foreach ($bookGroup as $raw) {
                $libraryData[$raw->book_id]['authors'][] = Author::getByID($raw->author_id)->getFIO();
            }
        }

        return $libraryData;
    }

    private static function parseBookID()
    {
        $editedBookID = explode("/", Redirect::back()->getTargetUrl());
        return last($editedBookID);
    }
}
