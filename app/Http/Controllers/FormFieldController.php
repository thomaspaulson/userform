<?php

namespace App\Http\Controllers;

use App\Models\FormField;
use App\Models\FormFieldOption;
use App\Models\UserForm;
use Illuminate\Http\Request;

class FormFieldController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $fields = FormField::where('userform_id', $request->userform_id)->get();
        return view('admin.fields.index')->with([
            'fields' => $fields
        ]);
    }


    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request)
    {
        return view('admin.fields.create')->with([
            'userform_id' => $request->userform_id
        ]);
    }


    public function store(Request $request)
    {
        $formField = FormField::create([
            'title' => $request->title,
            'type' => $request->type,
            'userform_id'  => $request->userform_id
        ]);

        if ($request->has('option') && $request->type == "select"){
            $options = $request->option;
            foreach($options as $val){
                FormFieldOption::create([
                    'name' => $val,
                    'value' => $val,
                    'formfield_id' => $formField->id,
                ]);
            }
        }

        return redirect()->route('admin.forms.show', $request->userform_id);
    }

    // public function show(UserForm $form)
    // {
    //     return view('admin.fields.show')->with([
    //         'form' => $form
    //     ]);
    // }

    public function edit(FormField $field)
    {
        return view('admin.fields.edit')->with([
            'field' => $field
        ]);
    }

    public function update(FormField $field, Request $request)
    {

        $field->update([
            'title' => $request->title,
            'type' => $request->type
        ]);



        if ($request->has('option') && $request->type == "select"){
            $field->options()->delete();
            $options = $request->option;
            foreach($options as $val){
                FormFieldOption::create([
                    'name' => $val,
                    'value' => $val,
                    'formfield_id' => $field->id,
                ]);
            }
        }

        return redirect()->route('admin.forms.show', $field->userform_id);


        //return redirect()->route('admin.fields.show', $form->id);
    }

    public function destroy(FormField $field)
    {
        $field->delete();
        $userform_id = request()->userform_id;
        return redirect()->route('admin.forms.show', $userform_id);
    }
}
