<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "image" => $this->img,
            "location" => $this->location,
            "price" => $this->price,
            "worker_level" => $this->worker_level,
            "description" => $this->description,
            "title" => $this->title,
            "revews" => $this->revews,
            "is_available" => $this->is_available,
        ];
    }
}
