<?php

namespace App\Http\Controllers;

use App\Http\Utilities\Country;

class TestController extends Controller
{
    public function test()
	{		
		$code = Country::code('Bahamas');
		
		$code = 'ru';
		
		$country = Country::name($code);
		
		return view('test', compact('request', 'code', 'country'));
	}
}
