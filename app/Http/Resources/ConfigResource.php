<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConfigResource extends JsonResource
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
            'last_accident' => $this->last_accident,
            'main_info_text' => $this->main_info_text,
            'marquee_text' => $this->marquee_text,
            'display_main_info' => boolval($this->display_main_info),
            'display_media' => boolval($this->display_media),
            'display_charts' => boolval($this->display_charts),
            'media_id' => $this->media_id,
            'media' => new MediaResource($this->media),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
