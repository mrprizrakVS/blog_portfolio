<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Commentarie
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $author
 * @property string $content
 * @property int $article_id
 * @property \Carbon\Carbon $created_at
 * @property-read \App\Models\Article $article
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commentarie whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commentarie whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commentarie whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commentarie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Commentarie whereId($value)
 */
class Commentarie extends Model
{

    protected $table = 'commentaries';

    protected $fillable = [
        'author',
        'content',
        'article_id'
    ];

    protected $casts = [
        'author' => 'string',
        'content' => 'text',
        'article_id' => 'integer'
    ];

    protected $dates = [
        'created_at'
    ];

    public function setUpdatedAtAttribute($value)
    {
        //TODO disable updated_at
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
