<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DisabledJobsResource extends JsonResource
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
            'work_time_name' => $this->workTime->name,
            'country_name' => $this->country->name,
            'position' => $this->position,
            'candidates_count' => $this->candidates->count(),
            'candidates_with_high_result_count' => $this->id,
            'created_at' => $this->created_at
        ];
    }
}
