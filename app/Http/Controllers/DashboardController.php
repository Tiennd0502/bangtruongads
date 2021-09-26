<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $current_page = 'dashboard';

    public function __construct()
    {
        view()->share('current_page', $this->current_page);
    }

    public function index(){
        return view('dashboard');
    }
}
