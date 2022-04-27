<?php

namespace App\Services;

use App\Interfaces\BookInterface;
use App\Interfaces\BookOrderInterface;
use App\Models\Book;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BookService implements BookInterface
{
    public function store($request) : Book
    {
        try{
            return Book::create($request);
        } catch(\Exception $e){
            throw new HttpException($e->getMessage());
        }
    }
}