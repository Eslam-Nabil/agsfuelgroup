<?php

namespace Modules\Form\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\FormField\Entities\FormField;
use Modules\Categories\Entities\Categories;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'user_id',
        'category_id',
        'created_at',
        'updated_at'
    ];
    public function category(){
        $this->hasOne(Categories::Class,'category_id');
    }
    public function formfield(){
        $this->belongsTo(FormField::Class,'form_id');
    }

    protected static function newFactory()
    {
        return \Modules\Form\Database\factories\FormFactory::new();
    }
}
