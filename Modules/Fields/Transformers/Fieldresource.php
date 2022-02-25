<?php

namespace Modules\Fields\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class Fieldresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'field_key'      => $this->field_key,
            'field_lable'     => $this->field_lable
        ];
    }
}
