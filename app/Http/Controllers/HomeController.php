<?php

namespace App\Http\Controllers;

use App\Models\SubmittedForm;
use App\Models\SubmittedFormField;
use App\Models\UserForm;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $forms = UserForm::get();
        return view('home')->with([
            'forms' => $forms
        ]);
    }

    public function show($id){
        $form = UserForm::find($id);
        return view('form')->with([
            'form' => $form
        ]);
    }

    public function store(Request  $request){

        $submittedForm = SubmittedForm::create([
            'userform_id' => $request->userform_id
        ]);

        $fields = $request->except(['userform_id','_token']);
        foreach ($fields as $name => $val) {
            SubmittedFormField::create([
                'name' => $name,
                'value' => $val,
                'submitted_form_id' => $submittedForm->id,
            ]);
        }

        return redirect()->route('forms.show', $request->userform_id)->with('submitted', 'Form submitted');
    }
}
