<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'nullable|string',
            'auther' => 'required|string|max:100',
        ]);

        Article::create($request->all());

        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'nullable|string',
            'auther' => 'required|string|max:100',
        ]);

        $article = Article::findOrFail($id);
        $article->update($request->all());

        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id); // Find the article, or fail with 404
        $article->delete(); // Delete the article

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully!');
    }
}
