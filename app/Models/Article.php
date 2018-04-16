<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Article
 *
 * @mixin \Eloquent
 */
class Article extends Model
{
    protected $table = 'articles';

    public function commentaries(){
        return $this->hasMany(Commentarie::class, 'article_id');
    }
}
