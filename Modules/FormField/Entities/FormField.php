<?php

namespace Modules\FormField\Entities;

use Modules\Form\Entities\Form;
use Modules\Fields\Entities\Field;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormField extends Model
{
    use HasFactory;

    protected $fillable = ['field_id','form_id'];
    public $timestamps=false;

    public function form(){
        $this->hasMany(Form::Class,'form_id');
    }
    public function field(){
        $this->hasOne(Field::Class,'field_id');
    }
    protected static function newFactory()
    {
        return \Modules\FormField\Database\factories\FormFieldFactory::new();
    }
}
