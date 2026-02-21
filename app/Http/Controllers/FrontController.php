<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Service;

class FrontController extends Controller
{
    public function home()
    {
        $services = Service::where('status', 'active')->take(4)->get();
        return view('pages.home', compact('services'));
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.dynamic', compact('page'));
    }
}
