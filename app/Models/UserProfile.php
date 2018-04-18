<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = [
        'user_id',
        'browser',
        'ip'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'browser' => 'string',
        'ip' => 'string'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
