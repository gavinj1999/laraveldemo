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

    public function getData(Request $request){
      $credit_check = ($request['credit_check']);
      $data = Langivares::select('lender','credit_check')->where('enabled', 1)->where('credit_check','NOT LIKE',  $credit_check)->get();
      return($data);
    }
}
