<?php

namespace App\Http\Controllers;

use App\Models\FormField;
use App\Models\UserForm;
use Illuminate\Http\Request;

class UserFormController extends Controller
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
    public function index()
    {
        $forms = UserForm::get();
        return view('admin.forms.index')->with([
            'forms' => $forms
        ]);
    }


    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.forms.create');
    }


    public function store(Request $request)
    {
        $form = UserForm::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.forms.show', $form->id);
    }

    public function show(UserForm $form)
    {
        $fields = FormField::where('userform_id', $form->id)->get();
        return view('admin.forms.show')->with([
            'form' => $form,
            'fields' => $fields,
        ]);
    }

    public function edit(UserForm $form)
    {
        return view('admin.forms.edit')->with([
            'form' => $form
        ]);
    }

    public function update(UserForm $form, Request $request)
    {
        $form->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.forms.show', $form->id);
    }

    public function destroy(UserForm $form)
    {
        $form->delete();
        return redirect()->route('admin.forms.index');
    }
}
