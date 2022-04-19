<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function store()
    {

        $data = $this->validateRequest();

        Book::create($data);
    }

    public function update(Book $book)
    {  
        $data = $this->validateRequest();

        $book->update($data);
    }

    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'author' => 'required'
        ]);
    }
}
