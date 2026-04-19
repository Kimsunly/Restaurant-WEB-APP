<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Slide;

class PublicController extends Controller
{
    public function home()
    {
        $slides = Slide::where('is_active', true)
                    ->orderBy('sort_order')
                    ->get();

        $featuredMenus = Menu::where('is_active', true)
                            ->latest()
                            ->get();

        return view('public.home', compact('slides', 'featuredMenus'));
    }

    public function menu()
    {
        $menus = Menu::where('is_active', true)
                    ->when(request('category'), function($query, $category) {
                        $query->where('category', $category);
                    })
                    ->get();

        return view('public.menu', compact('menus'));
    }

    public function about()
    {
        return view('public.about');
    }

    public function book()
    {
        return view('public.book');
    }
}
