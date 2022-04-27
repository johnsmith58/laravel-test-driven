<?php

namespace App\Services;

use App\Interfaces\UserInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class UserService implements UserInterface
{
    public function login($request) {
        try{
            if (Auth::attempt($request)) {
                $user = Auth::user();
                $token = $user->createToken('new_user', ['server-access']);
                return $token->plainTextToken;
            }else{
                return false;
            }
        }catch(\Exception $e){
            throw new AuthenticationException($e->getMessage());
        }
    }

}