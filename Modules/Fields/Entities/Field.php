<?php

namespace Modules\Fields\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\FormField\Entities\FormField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Field extends Model
{
    use HasFactory;

    protected $fillable = ['field_key','field_lable'];
    public $timestamps =false;

    public function formfield(){
        $this->belongsTo(FormField::Class,'field_id');
    }
    protected static function newFactory()
    {
        return \Modules\Fields\Database\factories\FieldFactory::new();
    }
}
