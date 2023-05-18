<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MyDoctorResource extends JsonResource
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
            'id' => $this[0]->id,
            'name' => $this[0]->name,
            'image' => $this[0]->image,
            'specialty' => $this[0]->specialty,
            'email' => $this[0]->email,
            'no_phone' => $this[0]->no_phone,
            'room' => $this[0]->room
        ];
    }
}
