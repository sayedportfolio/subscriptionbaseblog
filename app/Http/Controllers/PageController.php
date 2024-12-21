<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contactPage()
    {
        return view('contact');
    }

    public function termsPage()
    {
        return view('terms');
    }

    public function policyPage()
    {
        return view('policy');
    }
}
