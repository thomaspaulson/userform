<?php

namespace App\Http\Controllers;

use App\Models\SubmittedForm;
use App\Models\UserForm;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $forms = UserForm::limit(5)->get();
        $submissions = SubmittedForm::limit(5)->get();

        return view('admin.index')->with([
            'forms' => $forms,
            'submissions' => $submissions
        ]);
    }

    public function show($id)
    {

        $submission = SubmittedForm::find($id);

        return view('admin.submission.view')->with([
            'submission' => $submission
        ]);
    }

}
