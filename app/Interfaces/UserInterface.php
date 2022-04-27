<?php

namespace App\Interfaces;

use App\Http\Requests\UserLoginRequest;

interface UserInterface
{
    public function login(Array $request);
}