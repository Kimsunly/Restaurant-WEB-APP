<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('sort_order')->paginate(10);
        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slides.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'image'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'sort_order'  => 'nullable|integer',
        ]);

        $validated['image'] = $request->file('image')
                                    ->store('slides', 'public');

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $request->input('sort_order', 0);

        Slide::create($validated);

        return redirect()->route('admin.slides.index')
                        ->with('success', 'Slide created successfully!');
    }

    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    public function update(Request $request, Slide $slide)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'sort_order'  => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($slide->image) {
                Storage::disk('public')->delete($slide->image);
            }
            $validated['image'] = $request->file('image')
                                        ->store('slides', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $request->input('sort_order', 0);

        $slide->update($validated);

        return redirect()->route('admin.slides.index')
                        ->with('success', 'Slide updated successfully!');
    }

    public function destroy(Slide $slide)
    {
        if ($slide->image) {
            Storage::disk('public')->delete($slide->image);
        }

        $slide->delete();

        return redirect()->route('admin.slides.index')
                        ->with('success', 'Slide deleted successfully!');
    }
}
