<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Categorie
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Categorie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Categorie whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Categorie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Categorie whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Categorie whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
 */
class Categorie extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'text'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'category_article', 'category_id', 'article_id');
    }

}
