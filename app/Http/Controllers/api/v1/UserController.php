<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Services\UserService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponser;

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(UserLoginRequest $request)
    {
        $user = $this->userService->login($request->validated());
        if($user)
        {
            return $this->success(200, $user);
        }else{
            return $this->error(403, null, 'Invalid credentials');
        }
    }
}
