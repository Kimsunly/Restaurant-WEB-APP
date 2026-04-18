<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Slide;

class DashboardController extends Controller
{
    public function index()
    {
        $menuCount = Menu::count();
        $activeMenuCount = Menu::where('is_active', true)->count();
        $slideCount = Slide::count();
        $activeSlideCount = Slide::where('is_active', true)->count();
        $recentMenus = Menu::latest()->take(4)->get();
        $recentSlides = Slide::orderBy('sort_order')->take(4)->get();

        return view('admin.dashboard', compact(
            'menuCount',
            'activeMenuCount',
            'slideCount',
            'activeSlideCount',
            'recentMenus',
            'recentSlides'
        ));
    }
}
