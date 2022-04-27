<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return response()->json('Book V2');
    }
}
