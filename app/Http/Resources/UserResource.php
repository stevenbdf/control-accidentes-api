<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'username' => $this->username,
            'role' => isset($this->getRoleNames()[0]) ? $this->getRoleNames()[0] : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
