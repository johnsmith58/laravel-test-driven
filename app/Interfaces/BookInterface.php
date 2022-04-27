<?php

namespace App\Interfaces;

use App\Http\Requests\BookStoreRequest;

interface BookInterface
{
    public function store(array $request);
}