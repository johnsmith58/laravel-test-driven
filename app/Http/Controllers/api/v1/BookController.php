<?php

namespace App\Http\Controllers\api\v1;

use Exception;
use App\Models\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\BookService;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookStoreRequest;
use App\Interfaces\BookInterface;
use App\Services\BookOrderService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * @var BookService
     */
    private $bookService;

    /**
     * BookController constructor.
     * @param BookInterface $bookService
     * @return void
     */

    public function __construct(BookInterface $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        return response()->json('Book V1');
    }

    public function store(BookStoreRequest $request)
    {
        $book = $this->bookService->store($request->validated());
        return $this->success(200, $book);
    }

    public function show(Book $book)
    {
        return $this->success(200, $book);
    }

    public function order(Book $book, BookStoreRequest $request)
    {
        $book = (new BookOrderService)->store($request->validated(), $book);
        return $this->success(200, '200');
    }
}
