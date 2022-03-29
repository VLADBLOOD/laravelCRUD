<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Author extends Model
{
    protected $table = 'author';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function getByID($id)
    {
        return self::where('id', $id)->first();
    }

    public static function addNewAuthor(Request $request)
    {
        $author = new self();
        $author->fillByRequest($request);
    }

    public static function updateByID($id, Request $request)
    {
        self::getByID($id)->fillByRequest($request);
    }

    public static function deleteAuthorByID($id)
    {
        self::where('id', $id)->delete();
    }

    private function fillByRequest(Request $request)
    {
        $this->surname = $request->surname;
        $this->name = $request->name;
        $this->patronymic = $request->patronymic;
        $this->save();
    }

    public function getFIO()
    {
        return $this->surname . ' ' . $this->name . ' ' . $this->patronymic;
    }

    public static function getAllFIO()
    {
        $authors = Author::all();

        return $fios = $authors->map(function ($author){
            return $author->getFIO();
        })->toArray();
    }
}
