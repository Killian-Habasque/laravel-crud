<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HelloController extends Controller
{
    public function show(string $id): View
    {
        return view('hello', ['id' => $id]);
    }
}
