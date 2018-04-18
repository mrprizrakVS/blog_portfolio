<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Commentarie;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article_id = Article::create([
            'name' => $request->name,
            'content' => $request->content,
            'user_id' => \Auth::user()->id
        ]);
        $article = Article::find($article_id->id);
        $article->categories()->sync($request->categories);
        return redirect(route('article.show', $article_id));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $commentaries = $article->commentaries;
        return view('article.show', compact('article', 'commentaries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $mainCategory = $article->categories;
        $array = [];
        foreach ($mainCategory as $item){
            $array[] = $item->id;
        }
        $categories = Categorie::all();
        return view('article.update', compact('article', 'categories', 'array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Article::findOrFail($id)->update($request->all());
        $article = Article::find($id);
        $article->categories()->sync($request->categories);
        return redirect(route('article'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
