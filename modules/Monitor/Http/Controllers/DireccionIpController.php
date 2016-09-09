<?php namespace Modules\Monitor\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Monitor\Entities\Servidor;
use Modules\Monitor\Entities\DireccionIp;
use Modules\Monitor\Http\Requests\DireccionIpRequest;
use Pingpong\Modules\Routing\Controller;

class DireccionIpController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        if(Auth::user()->can('read-ips')) {
            $ips = DireccionIp::with('servidor')->get();
            return view('monitor::direccionip.index', compact('ips'));
        }

        return redirect('auth/logout');
    }
    
    public function create() {
        if(Auth::user()->can('create-ips')) {
            $servidores = Servidor::orderBy('nombre', 'asc')->lists('nombre', 'id');
            return view('monitor::direccionip.create', compact('servidores'));
        }
        return redirect('auth/logout');
    }
    
    
    public function store(DireccionIpRequest $request) {
        if(Auth::user()->can('create-ips')) {
            $data = DireccionIp::create($request->all());
            $direccionip = DireccionIp::findOrFail($data->id);
            Session::flash('message', trans(
                    'monitor::ui.direccionip.message_create', array('ip' => $direccionip->ip))
            );
            return redirect('monitor/direccionip/create');
        }

        return redirect('auth/logout');
    }
    
    public function edit($id) {
        if(Auth::user()->can('update-ips')) {
            $direccionip = DireccionIp::findOrFail($id);
            $servidores = Country::orderBy('nombre', 'asc')->lists('nombre', 'id');
            return view('monitor::direccionip.edit', compact('direccionip', 'servidores'));
        }
        return redirect('auth/logout');
    }
    
    public function update($id, DireccionIpRequest $request) {
        if(Auth::user()->can('update-ips')) {
            $direccionip = DireccionIp::findOrFail($id);
            $direccionip->update($request->all());
            Session::flash('message', trans(
                    'monitor::ui.direccionip.message_update', array('ip' => $direccionip->ip))
            );
            return redirect('monitor/direccionip');
        }
        return redirect('auth/logout');
    }
    
    public function destroy($id) {
        if(Auth::user()->can('delete-ips')) {
            $direccionip = DireccionIp::findOrFail($id);
            DireccionIp::destroy($id);
            Session::flash('message', trans(
                    'monitor::ui.direccionip.message_delete', array('ip' => $direccionip->ip))
            );
            return redirect('monitor/direccionip');
        }
        return redirect('auth/logout');
    }
	
}