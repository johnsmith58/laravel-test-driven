<?php

namespace App\Interfaces;

use App\Models\Book;
use App\Http\Requests\BookStoreRequest;

interface BookOrderInterface
{
    public function store(array $request, Book $book);
}