<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    public function index()
    {
        $contents = PageContent::orderBy('section')->orderBy('order')->paginate(20);
        return view('admin.page-contents.index', compact('contents'));
    }

    public function create()
    {
        return view('admin.page-contents.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'section' => 'required|string|max:255',
            'key' => 'required|string|max:255',
            'value_en' => 'required|string',
            'value_de' => 'nullable|string',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        PageContent::create($validated);

        return redirect()->route('admin.page-contents.index')
            ->with('success', 'Page content created successfully.');
    }

    public function edit(PageContent $pageContent)
    {
        return view('admin.page-contents.edit', compact('pageContent'));
    }

    public function update(Request $request, PageContent $pageContent)
    {
        $validated = $request->validate([
            'section' => 'required|string|max:255',
            'key' => 'required|string|max:255',
            'value_en' => 'required|string',
            'value_de' => 'nullable|string',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $pageContent->update($validated);

        return redirect()->route('admin.page-contents.index')
            ->with('success', 'Page content updated successfully.');
    }

    public function destroy(PageContent $pageContent)
    {
        $pageContent->delete();

        return redirect()->route('admin.page-contents.index')
            ->with('success', 'Page content deleted successfully.');
    }
}
