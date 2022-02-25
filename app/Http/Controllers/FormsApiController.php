<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Form\Entities\Form;
use Modules\Fields\Entities\Field;
use Illuminate\Contracts\Auth\Guard;
use Modules\FormField\Entities\FormField;
use Modules\Categories\Entities\Categories;
use Modules\Form\Transformers\FormResource;
use Modules\Categories\Transformers\CategoryResource;

class FormsApiController extends Controller
{
    //
    public function __construct(Guard $auth)
    {
            $this->currentUser = $auth->user();

    }

    public function get_all_categories(){
        $cats=Categories::get();
        return response()->json(['success' => true, 'data' =>CategoryResource::collection($cats)], 200);
    }

    public function get_categories_form( $id= null ){
        if($id){
        $catid=$id;
        }else{
        return response()->json(['success' => false, 'data' =>'please enter id of category'], 200);
        }
        $forms=Form::where('category_id',$catid)->get();
        if($forms){
        return response()->json(['success' => true, 'data' =>FormResource::collection($forms)], 200);
        }else{
            return response()->json(['success' => false, 'data' =>'no froms'], 200);
        }
    }
    public function get_form_fields( $id= null ){
        $fieldsarr=[];
        if($id){
        $form_id=$id;
        }else{
        return response()->json(['success' => false, 'data' =>'please enter id of category'], 200);
        }
        $exist=FormField::where('form_id',$form_id)->exists();
        $fields=FormField::where('form_id',$form_id)->get();

        foreach($fields as  $f){
            $ff=Field::where('id',$f->id)->first();
           array_push($fieldsarr,$ff);
        }

        if($exist){
        return response()->json(['success' => true, 'data' =>$fieldsarr], 200);
        }else{
            return response()->json(['success' => false, 'data' =>'Wrong form ID'], 200);
        }
    }
}
