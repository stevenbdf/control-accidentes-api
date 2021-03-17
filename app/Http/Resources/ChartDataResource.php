<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChartDataResource extends JsonResource
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
            'chart_id' => $this->chart_id,
            'chart' => $this->chart,
            'x_value' => $this->x_value,
            'y_value' => $this->y_value,
            'color' => $this->color,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at
        ];
    }
}
