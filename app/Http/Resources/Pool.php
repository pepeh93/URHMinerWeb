<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\Resource;

class Pool extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'host' => $this->host,
            'last_checked_at' => Carbon::parse($this->last_checked_at)->diffForHumans(),
            'status' => $this->is_alive
        ];
    }
}
