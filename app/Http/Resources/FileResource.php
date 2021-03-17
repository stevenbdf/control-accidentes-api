<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        if (strpos($this->path, 'http') !== false) {
            $url = $this->path;
        } else {
            $url = url("api/files/{$this->id}");
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $url,
            'content_type' => $this->content_type,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at
        ];
    }
}
