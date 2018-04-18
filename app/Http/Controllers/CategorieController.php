<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Repository\CategorieRepository;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    protected $model;

    public function __construct(CategorieRepository $categorieRepository)
    {
        $this->model = $categorieRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->model->getAll();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_id = $this->model->create($request->all());
        return redirect(route('categories.show', $category_id->id));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->model->getById($id);
        $articles = $category->articles;
        return view('categories.show', compact('category', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = $this->model->getById($id);
        return view('categories.update', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->model->update($request->all());
        return redirect(route('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect(route('categories'));

    }
}
