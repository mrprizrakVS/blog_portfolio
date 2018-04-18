<?php

namespace App\Repository;

use App\Models\Article;

class ArticleRepository
{
    public $model;

    public function __construct(Article $article)
    {
        $this->model = $article;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        return $this->getById($id)->update($data);
    }

    public function delete($id)
    {
        return $this->getById($id)->delete();
    }
}