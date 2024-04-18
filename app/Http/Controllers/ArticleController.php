<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }
    public function show(string $id): View
    {
        return view('articles.profile', ['articles' => Article::findOrFail($id)]);
    }
    public function create(): View
    {
        return view('articles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required|max:255',
        ]);

        Article::create($request->all());

        return redirect()->route('articles.index')->with('success', 'Article créé avec succès.');
    }

    public function edit(Article $article): View
    {
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required|max:255',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès.');
    }
}
