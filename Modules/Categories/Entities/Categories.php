<?php

namespace Modules\Categories\Entities;

use Modules\Form\Entities\Form;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;
    protected $table ="categories";
    protected $fillable = [
        'id','name','updated_at','created_at'
    ];

    public function form(){
        $this->blongsTo(Form::Class,'category_id');
    }
    
    protected static function newFactory()
    {
        return \Modules\Categories\Database\factories\CategoriesFactory::new();
    }

}
