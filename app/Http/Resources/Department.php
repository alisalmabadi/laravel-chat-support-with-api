<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Department extends Resource
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
            'name'=>$this->name,
            'id'=>$this->id,
            'description'=>$this->description
        ];
    }
}