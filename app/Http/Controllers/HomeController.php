<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{

    /**
     * Home index action
     *
     * @return Illuminate\View\View
     */
    public function index(): View
    {
        return view('index');
    }
}
