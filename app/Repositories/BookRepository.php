<?php

namespace App\Repositories;

use App\Exceptions\UserNotFoundException;
use App\Models\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookRepository
{
    public static function getBookAll()
    {
        return Book::all();
    }

    public function getBookById($id)
    {
        $book = Book::where('id', $id)->first();
        if (!$book) {
            throw new UserNotFoundException('Book not found by id: ' . $id);
        }
        return $book;
    }
}