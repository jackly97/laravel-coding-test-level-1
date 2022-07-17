<?php

namespace App\Http\Resources\v1\api\Event;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'startAt' => $this->start_at,
            'endAt' => $this->end_at,
        ];
    }
}
