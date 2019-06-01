<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Content extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'year' => $this->year,
            'country' => $this->country,
            'block_amount' => $this->block_amount,
            'algorithm' => $this->algorithm,
            'unit' => $this->unit,
            'maximum_value' => $this->maximum_value,
            'video_id' => $this->video_id,
            'content_type_id' => $this->content_type_id,
            'image' => $this->image,
            'favorito' => DB::table('favorites')->where('user_id', Auth::user()->id)
                ->where('content_id' , $this->id)->exists() ? true : false,
            'extra_button_link' => $this->extra_button_link && $this->extra_button_name ? $this->extra_button_link : '',
            'extra_button_name' => $this->extra_button_name && $this->extra_button_link ? $this->extra_button_name : '',
        ];
    }
}
