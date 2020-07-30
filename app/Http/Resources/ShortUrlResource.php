<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShortUrlResource extends JsonResource
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
            'code' => $this->code,
            'target_url' => $this->target_url,
            'access_token' => $this->access_token,
            'clicks' => $this->clicks,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
