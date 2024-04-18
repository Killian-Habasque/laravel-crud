<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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
        return view('articles.article', ['article' => Article::findOrFail($id)]);
    }
    public function create(): View
    {
        $categories = Category::all();
        return view('articles.create', ['categories' => $categories]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|max:255',
        ]);
    
        $user = Auth::user();
    
        $requestData = $request->all();
        $requestData['user_id'] = $user->id;

        Article::create($requestData);
    
        return redirect()->route('articles.index')->with('success', 'Article créé avec succès.');
    }

    public function edit(Article $article): View
    {
        $user = Auth::user();
        $categories = Category::all();
        
        if($article->user_id == $user->id) {
            return view('articles.edit', ['article' => $article, 'categories' => $categories]);
        } else {
            abort(403, 'Accès non autorisé');
        } 
    }
    public function update(Request $request, Article $article): RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|max:255',
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
