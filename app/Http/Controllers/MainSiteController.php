<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainSiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Shows the Home landing page of the website
     * @return View
     */
    public function index(): view
    {
        return view('index');
    }
}
