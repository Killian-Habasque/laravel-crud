<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }
    public function show(string $id): View
    {
        return view('categories.article', ['category' => Category::findOrFail($id)]);
    }
    public function create(): View
    {
        return view('categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Categorie créée avec succès.');
    }

    public function edit(Category $category): View
    {
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Categorie mise à jour avec succès.');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categorie supprimée avec succès.');
    }
}
