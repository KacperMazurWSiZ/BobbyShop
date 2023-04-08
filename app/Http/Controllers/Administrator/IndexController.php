<?php

namespace App\Http\Controllers\Administrator;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index()
    {
        return view('administrator.default');
    }
}
