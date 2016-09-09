<?php namespace Modules\Monitor\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Pingpong\Modules\Routing\Controller;
use Modules\Monitor\Entities\EstadoServidor;
use Modules\Monitor\Http\Requests\EstadoServidorRequest;

class EstadoServidorController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
		
    public function index() {
        
        if(Auth::user()->can('read-estadosservidor')) {

            $estadosservidor = EstadoServidor::all();

            return view('monitor::estadoservidor.index', compact('estadosservidor'));
        }

        return redirect('auth/logout');
               
    }
    
    public function create() {

        if(Auth::user()->can('create-estadosservidor')) {

        return view('monitor::estadoservidor.create');

        }

        return redirect('auth/logout');
    }
    
    public function store(EstadoServidorRequest $request) {

        if(Auth::user()->can('create-estadosservidor')) {

        $data = EstadoServidor::create($request->all());

        $estadoservidor = EstadoServidor::findOrFail($data->id);

        Session::flash('message', trans('monitor::ui.estadoservidor.message_create', array('name' => $estadoservidor->name)));

        return redirect('monitor/estadoservidor/create');

        }

        return redirect('auth/logout');
    }
    
    public function destroy($id) {

        if(Auth::user()->can('delete-estadosservidor')) {

        $estadoservidor = EstadoServidor::findOrFail($id);

        EstadoServidor::destroy($id);

        Session::flash('message', trans('monitor::ui.estadoservidor.message_delete', array('estado' => $estadoservidor->name)));

        return redirect('monitor/estadoservidor');

        }

        return redirect('auth/logout');
    }
    
    public function edit($id) {

        if(Auth::user()->can('update-estadosservidor')) {

        $estadoservidor = EstadoServidor::findOrFail($id);

        return view('monitor::estadoservidor.edit', compact('estadoservidor'));

        }

        return redirect('auth/logout');
    }

    public function update($id, EstadoServidorRequest $request) {

        if(Auth::user()->can('update-estadosservidor')) {

        $estadoservidor = EstadoServidor::findOrFail($id);

        $estadoservidor->update($request->all());

        Session::flash('message', trans('monitor::ui.estadoservidor.message_update', array('estado' => $estadoservidor->estado)));

        return redirect('monitor/estadoservidor');

        }

        return redirect('auth/logout');
    }
	
}