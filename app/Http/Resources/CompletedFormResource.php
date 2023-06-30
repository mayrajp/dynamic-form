<?php

namespace App\Http\Resources;

use App\Models\DynamicForm;
use Illuminate\Http\Resources\Json\JsonResource;

class CompletedFormResource extends JsonResource
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'expires_in' => $this->expires_in,
            'answers' => AnswareResource::collection($this->answers),
        ];
    }
}
