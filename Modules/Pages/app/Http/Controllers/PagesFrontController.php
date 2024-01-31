<?php

namespace Modules\Pages\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Modules\Pages\app\Models\Category;
use Modules\Pages\app\Models\Page;

class PagesFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param $slug
     * @return View
     */
    public function index($slug): view
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        $category = $page->category()->first();

        $view = $page->getIndexViewPath($category);

        return view($view, compact('page'));
    }

    /**
     * Show the specified resource.
     * @param $slug
     * @return View
     */
    public function show($slug): view
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        $category = $page->category()->firstOrFail();

        $view = $page->getShowViewPath($category);

        return view($view, compact('page'));
    }
}
