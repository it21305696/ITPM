<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    /**
     * Show the supervisor's home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('suphome');
    }
}
