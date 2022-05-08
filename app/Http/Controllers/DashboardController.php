<?php

namespace App\Http\Controllers;

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
        return view('admin.index')->with([
            'forms' => $forms
        ]);
    }

}
