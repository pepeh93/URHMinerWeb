<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id', 'content_id'
    ];

    public function content()
    {
        return $this->belongsTo('App\Content');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
