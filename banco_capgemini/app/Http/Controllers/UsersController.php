<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;

class UsersController extends Controller
{
    public function getUserByEmail(Request $request)
    {
        $json = json_decode($request->json()->all());

        return User::where('email', '=', $json->email)->with('account')->firstOrFail();

    }
}
