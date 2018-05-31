<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Langivares;

class IndexController extends Controller
{
    public function index(){

    	$data = Langivares::all();

    	return view('welcome')
    	->with ('data', $data);
    }
}
