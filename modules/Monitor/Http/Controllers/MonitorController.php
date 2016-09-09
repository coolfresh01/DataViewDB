<?php namespace Modules\Monitor\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Modules\Monitor\Entities\Servidor;
use Pingpong\Modules\Routing\Controller;

class MonitorController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
		
    public function index() {
        
        //return view('monitor::servidor_admin');
        
        if (Auth::user()->hasRole('admin')) { 
            $servidores = Servidor::getAllServidores();
            //dd($data);
            //return view('monitor::servidor_admin');
            return view('monitor::servidor_admin', compact('servidores'));
        }
    }
}