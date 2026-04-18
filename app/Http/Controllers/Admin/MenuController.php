<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    // Show all menus
    public function index()
    {
        $menus = Menu::latest()->paginate(10);
        return view('admin.menus.index', compact('menus'));
    }

    // Show create form
    public function create()
    {
        return view('admin.menus.create');
    }

    // Save new menu to DB
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'category'    => 'required|in:burger,pizza,pasta,fries',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                                        ->store('menus', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        Menu::create($validated);

        return redirect()->route('admin.menus.index')
                        ->with('success', 'Menu item created successfully!');
    }

    // Show edit form
    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    // Update in DB
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'category'    => 'required|in:burger,pizza,pasta,fries',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($menu->image) {
                Storage::disk('public')->delete($menu->image);
            }
            $validated['image'] = $request->file('image')
                                        ->store('menus', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $menu->update($validated);

        return redirect()->route('admin.menus.index')
                        ->with('success', 'Menu item updated successfully!');
    }

    // Delete from DB
    public function destroy(Menu $menu)
    {
        if ($menu->image) {
            Storage::disk('public')->delete($menu->image);
        }

        $menu->delete();

        return redirect()->route('admin.menus.index')
                        ->with('success', 'Menu item deleted successfully!');
    }
}
