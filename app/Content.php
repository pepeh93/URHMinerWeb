<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'name', 'algorithm', 'country', 'year', 'block_amount', 'category_id',
        'unit', 'maximum_value', 'description', 'video_id', 'image', 'content_type_id',
        'extra_button_name', 'extra_button_link'
    ];

    protected $hidden = ['created_at' , 'updated_at'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
