<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Article
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $content
 * @property int $category_id
 * @property string $file_url
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commentarie[] $commentaries
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereFileUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Categorie[] $categories
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereUserId($value)
 * @property-read \App\User $user
 */
class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'name',
        'content',
        'file_url',
        'user_id'
    ];

    protected $casts = [
        'name' => 'string',
        'content' => 'text',
        'file_url' => 'string',
        'user_id' => 'integer'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function commentaries()
    {
        return $this->hasMany(Commentarie::class, 'article_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Categorie::class, 'category_article', 'article_id', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
