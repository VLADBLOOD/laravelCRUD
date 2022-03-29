<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Helpers\Notifications;

class AuthorsController extends Controller
{
    public function showAuthorsPanel()
    {
        return view('authors')->with(['authors' => Author::all()]);
    }

    public function displayAuthorAddition($id = null)
    {
        return view("forms.authorAddition")->with([
            'author' => is_null($id) ? null : Author::getByID($id)
        ]);
    }

    public function addAuthor(Request $request)
    {
        if (self::isFIOExist($request)) {
            return Notifications::errorMessage('Такой автор уже существует');
        }

        Author::addNewAuthor($request);
        return Notifications::successMessage('Автор добавлен');
    }

    public function deleteAuthor($id)
    {
        Author::deleteAuthorByID($id);
        return Notifications::successMessage('Автор удален');
    }

    public function updateAuthor($id, Request $request)
    {
        Author::updateByID($id, $request);
        return Notifications::successMessage('Автор обновлен');
    }

    private static function isFIOExist($request)
    {
        $newAuthor = $request->surname . ' ' . $request->name . ' ' . $request->patronymic;
        return in_array($newAuthor, Author::getAllFIO());
    }
}
