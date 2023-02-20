<?php

namespace App\Http\Controllers\sample;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show()
    {
        return 'hello';
    }
}
