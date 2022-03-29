<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Book extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function getByID($id)
    {
        return self::where('id', $id)->first();
    }

    public static function addNewAuthor(Request $request)
    {
        $book = new self();
        $book->fillByRequest($request);
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
        $this->name = $request->name;
        $this->release = $request->release;
        $this->ISBN = $request->ISBN;
        $this->pages = $request->pages;
        $this->save();
    }

    public function getBookName()
    {
        return $this->name;
    }
}
