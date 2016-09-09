<?php namespace Modules\Monitor\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Monitor\Http\Requests\ServidorRequest;
use Pingpong\Modules\Routing\Controller;
use Modules\Monitor\Entities\Servidor;
use Modules\Monitor\Entities\Ambiente;
use Modules\Monitor\Entities\EstadoServidor;
use Modules\Monitor\Entities\SistemaOperativo;

class ServidorController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        if(Auth::user()->can('read-servidores')) {
            $servidores = Servidor::all();
            return view('monitor::servidor.index', compact('servidores'));
             
        }

        return redirect('auth/logout');    
    }
    
    public function create() {

        if(Auth::user()->can('create-servidores')) {

        $ambientes = Ambiente::orderBy('nombre', 'asc')->lists('nombre', 'id');
        $estadosservidor = EstadoServidor::orderBy('estado', 'asc')->lists('estado', 'id');
        $sistemasoperativos = SistemaOperativo::orderBy('nombre', 'asc')->lists('nombre', 'id');

        return view('monitor::servidor.create', compact('ambientes', 'estadosservidor', 'sistemasoperativos'));

        }

        return redirect('auth/logout');
    }
    
    public function store(ServidorRequest $request) {

        if(Auth::user()->can('create-servidores')) {
            $data = Servidor::create($request->all());
            $servidor = Servidor::findOrFail($data->id);
            Session::flash('message', trans(
                    'monitor::ui.servidor.message_create', array('name' => $servidor->name))    
                );

            return redirect('monitor/servidor/create');
        }

        return redirect('auth/logout');
    }
    
    public function edit($id) {

        if(Auth::user()->can('update-servidores')) {
            $servidor = Servidor::findOrFail($id);

            $ambientes = Ambiente::orderBy('nombre', 'asc')->lists('nombre', 'id');
            $estadosservidor = EstadoServidor::orderBy('estado', 'asc')->lists('estado', 'id');
            $sistemasoperativos = SistemaOperativo::orderBy('nombre', 'asc')->lists('nombre', 'id');
            return view('monitor::servidor.edit', compact('servidor', 'ambientes', 'estadosservidor', 'sistemasoperativos'));

        }

        return redirect('auth/logout');

    }

    public function update($id, ServidorRequest $request) {

        if(Auth::user()->can('update-servidores')) {
            $servidor = Servidor::findOrFail($id);
            $servidor->update($request->all());

            Session::flash('message', trans(
                'monitor::ui.servidor.message_update', array('name' => $servidor->nombre))
            );

            return redirect('monitor/servidor/');
        }

        return redirect('auth/logout');
    }
    
    public function destroy($id) {
        if(Auth::user()->can('delete-servidores')) {
            $servidor = Servidor::findOrFail($id);
            Servidor::destroy($id);
            Session::flash('message', trans(
                    'monitor::ui.servidor.message_delete', array('name' => $servidor->name))
                );

            return redirect('monitor/servidor');
        }

        return redirect('auth/logout');
    }
		
}