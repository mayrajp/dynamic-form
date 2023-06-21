<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FieldResource extends JsonResource
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
            'label' => $this->label,
            'type' => $this->type,
            'class' => $this->class,
            'img_url' => $this->img_url,
            'is_required' => $this->is_required,
            'is_multiple' => $this->is_multiple,
            'options' => json_decode($this->options),
        ];
    }
}
