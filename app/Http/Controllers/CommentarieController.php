<?php

namespace App\Http\Controllers;

use App\Models\Commentarie;
use Illuminate\Http\Request;

class CommentarieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author_str = explode(" ", $request->author);
        $author = ucfirst($author_str[0]). ' '. ucfirst($author_str[1]);
        Commentarie::create([
            'author' => $author,
            'content' => $request->content,
            'article_id' => $request->article_id
        ]);
        return redirect(route('article.show', $request->article_id));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentarie  $commentarie
     * @return \Illuminate\Http\Response
     */
    public function show(Commentarie $commentarie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentarie  $commentarie
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentarie $commentarie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentarie  $commentarie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentarie $commentarie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentarie  $commentarie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Commentarie::findOrFail($id)->delete();
        return redirect(route('article'));
    }
}
