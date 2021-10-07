<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public $current_page = 'telesales';

    public function __construct()
    {
        view()->share('current_page', $this->current_page);
    }

    public function index(){
        return view('order_confirm');
    }
}
