<?php

namespace Modules\Form\Http\Controllers;
use Illuminate\Http\Request;
use Modules\Form\Entities\Form;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Fields\Entities\Field;
use Modules\FormField\Entities\FormField;
use Modules\Categories\Entities\Categories;
use Illuminate\Contracts\Support\Renderable;
use Modules\FormField\Transformers\FormFieldsResource;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $forms=Form::get();
        $catdata=Categories::orderBy('id')->get();

        //$fieldsform=FormField::get();
        $fieldsform =DB::table('form_fields')
        ->leftJoin('forms', 'form_fields.form_id', '=', 'forms.id')
        ->leftJoin('fields', 'form_fields.field_id', '=', 'fields.id')
        ->get();
        $fields=[];
        foreach($fieldsform as $f){
            array(
                'form_id'=>$f->form_id,
                'form_name'=>$f->name,
                'user_id'=>$f->user_id,
                'category_id'=>$f->category_id,
                'form_id'=>$f->form_id,
                'form_id'=>$f->form_id,
            );
        }

        return view('form::index',compact('catdata','forms','fieldsform'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('form::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request1=$request->all();
        $count=(count($request1)-3)/2;
        $form =Form::create([
            'name'=> $request->form_name,
            'category_id'=>$request->category_id,
            'user_id' => 1
        ]);
        for($i=0;$i<$count; $i++){
            $field=Field::create([
                'field_key'=>$request1['field_name'.$i],
                'field_lable'=>$request1['field_lable'.$i],
            ]);
            FormField::create([
                'field_id'=>$field->id,
                'form_id'=>$form->id,
            ]);
        }
        return redirect()->route('formindex');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('form::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('form::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
