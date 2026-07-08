<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    $query = Article::query();

        if(request()->has('search')) {
        $query = $query->where('content','LIKE','%' . request()->get('search','') . '%')
                        ->orWhere('name','LIKE','%' . request()->get('search','') . '%')
                        ->orWhere('description','LIKE','%' . request()->get('search','') . '%');
        }


        $articles = $query->paginate(6);
        return view('articles.index', [
            'articles' => $articles
        ]);
    }
    public function indexany()
    {    $query = Article::query();

        if(request()->has('search')) {
        $query = $query->where('content','LIKE','%' . request()->get('search','') . '%')
                        ->orWhere('name','LIKE','%' . request()->get('search','') . '%')
                        ->orWhere('description','LIKE','%' . request()->get('search','') . '%');
        }


        $articles = $query->paginate(6);
        return view('welcome', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Article::class);

        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Article::class);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

    if ($request->hasFile('cover_image')) {

        $path = $request->file('cover_image')->store('pictures', 'public');

    }
        Article::create([
            ...$validated,
            'user_id' => $request->user()->id,
            'cover_image' => $path ?? null,
        ]);
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', [
            'article' => $article
        ]);
    }
    public function showany(string $id)
    {
        $article = Article::findOrFail($id);
        return view('showany', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Article $article)
    {   Gate::authorize('update', $article);
        $article = Article::findOrFail($id);
        return view('articles.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, Article $article)
    {
        Gate::authorize('update', $article);

        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Article $article)
    {
        Gate::authorize('delete', $article);

        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index');
    }
}
