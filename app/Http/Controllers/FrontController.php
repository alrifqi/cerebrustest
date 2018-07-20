<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class FrontController extends Controller
{
  public function getIndex(){
    $persons = Person::paginate(10);
    return view('front.index', ['persons' => $persons]);
  }    
}
