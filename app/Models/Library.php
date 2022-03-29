<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Library extends Model
{
    protected $table = 'library';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function addNew($bookID, $authorID)
    {
        $library = new self();
        $library->book_id = $bookID;
        $library->author_id = $authorID;
        $library->save();
    }

    public static function deleteBook($id)
    {
        self::where('book_id', $id)->delete();
    }

    public static function deleteAuthor($id)
    {
        self::where('author_id', $id)->delete();
    }

    public static function updateBook(Request $request, $bookID)
    {
        $oldAuthors = self::getAuthorsFromBook($bookID);
        $newAuthors = $request->author_id;

        self::deleteOldAuthors($oldAuthors, $newAuthors);
        self::addNewAuthors($oldAuthors, $newAuthors, $bookID);

        self::where('book_id', $bookID)->update([
            'book_id' => $request->book_id
        ]);
    }

    private static function deleteOldAuthors($oldAuthors, $newAuthors)
    {
        foreach ($oldAuthors as $old) {
            if (!in_array($old, $newAuthors)) {
                self::deleteAuthor($old);
            }
        }
    }

    private static function addNewAuthors($oldAuthors, $newAuthors, $bookID)
    {
        foreach ($newAuthors as $new) {
            if (!in_array($new, $oldAuthors)) {
                self::addNew($bookID, $new);
            }
        }
    }

    public static function getBooksGroup()
    {
        return self::all()->groupBy('book_id');
    }

    public static function getAuthorsFromBook($id)
    {
        return self::where('book_id', $id)->pluck('author_id')->toArray();
    }
}
