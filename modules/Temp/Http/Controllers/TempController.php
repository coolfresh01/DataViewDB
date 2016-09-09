<?php namespace Modules\Temp\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class TempController extends Controller {
	
	public function index()
	{
		return view('Temp::index');
	}
	
}