<?php

use Illuminate\Support\Facades\Route;

/* Authors */

Route::get('/authors', 'AuthorsController@showAuthorsPanel');

Route::get('/authors/add', 'AuthorsController@displayAuthorAddition');

Route::post('/authors/add', 'AuthorsController@addAuthor');

Route::get('/authors/edit/{id}', 'AuthorsController@displayAuthorAddition');

Route::post('/authors/update/{id}', 'AuthorsController@updateAuthor');

Route::get('/authors/delete/{id}', 'AuthorsController@deleteAuthor');

/* Books */

Route::get('/books', 'BooksController@showBooksPanel');

Route::get('/books/add', 'BooksController@displayBookAddition');

Route::post('/books/add', 'BooksController@addBook');

Route::get('/books/edit/{id}', 'BooksController@displayBookAddition');

Route::post('/books/update/{id}', 'BooksController@updateBook');

Route::get('/books/delete/{id}', 'BooksController@deleteBook');

/* Library */

Route::get('/library', 'LibraryController@showLibraryPanel');

Route::get('/library/add', 'LibraryController@displayLibraryAddition');

Route::post('/library/add', 'LibraryController@addToLibrary');

Route::get('/library/edit/{id}', 'LibraryController@displayLibraryAddition');

Route::post('/library/update/{id}', 'LibraryController@updateLibrary');

Route::get('/library/delete/{id}', 'LibraryController@deleteFromLib');
