<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $user = $request->user();
        return view('users.show', ['user' => $user]);
    }
}
