<?php

namespace Modules\FormField\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class FormFieldsResource extends JsonResource
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
            'id'    => $this->id,
            'form_id'  => $this->form_id,
            'field_id'  => $this->field_id,
        ];
     }
    }
