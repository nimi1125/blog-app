<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function detail()
    {
        return view('layouts.detail');
    }

    public function profile()
    {
        return view('dashboard');
    }

    public function edit()
    {
        return view('layouts.write');
    }

}