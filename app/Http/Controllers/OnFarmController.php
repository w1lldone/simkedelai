<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnFarmController extends Controller
{
    public function index()
    {
    	return view('onfarm.index');
    }
}
