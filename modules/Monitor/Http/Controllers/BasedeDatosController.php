<?php namespace Modules\Monitor\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Monitor\Http\Requests\BasedeDatosRequest;
use Pingpong\Modules\Routing\Controller;
use Modules\Monitor\Entities\Servidor;
use Modules\Monitor\Entities\Basededatos;
use Modules\Monitor\Entities\EstadoDb;


class BasedeDatosController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
	
    public function index() {
        if(Auth::user()->can('read-dbs')) {
            $bds = Basededatos::all();
            return view('monitor::basededatos.index', compact('bds'));
             
        }

        return redirect('auth/logout');    
    }
    
    public function create() {

        if(Auth::user()->can('create-dbs')) {

        $servidores = Servidor::orderBy('nombre', 'asc')->lists('nombre', 'id');
        $estadosdb = EstadoDb::orderBy('estado', 'asc')->lists('estado', 'id');

        return view('monitor::basededatos.create', compact('servidores', 'estadosdb'));

        }

        return redirect('auth/logout');
    }
    
    public function store(BasedeDatosRequest $request) {

        if(Auth::user()->can('create-dbs')) {
            $data = Basededatos::create($request->all());
            $db = Basededatos::findOrFail($data->id);
            Session::flash('message', trans(
                    'monitor::ui.database.message_create', array('name' => $db->sid))    
                );

            return redirect('monitor/basededatos/create');
        }

        return redirect('auth/logout');
    }
    
    public function edit($id) {

        if(Auth::user()->can('update-dbs')) {
            $db = Basededatos::findOrFail($id);

            $servidores = Servidor::orderBy('nombre', 'asc')->lists('nombre', 'id');
            $estadosdb = EstadoDb::orderBy('estado', 'asc')->lists('estado', 'id');
            return view('monitor::basededatos.edit', compact('db', 'servidores', 'estadosdb'));

        }

        return redirect('auth/logout');

    }
    
    public function update($id, BasedeDatosRequest $request) {

        if(Auth::user()->can('update-dbs')) {
            $db = Basededatos::findOrFail($id);
            $db->update($request->all());

            Session::flash('message', trans(
                'monitor::ui.database.message_update', array('name' => $db->sid))
            );

            return redirect('monitor/basededatos/');
        }

        return redirect('auth/logout');
    }
    
    public function destroy($id) {
        if(Auth::user()->can('delete-dbs')) {
            $db = Basededatos::findOrFail($id);
            Basededatos::destroy($id);
            Session::flash('message', trans(
                    'monitor::ui.database.message_delete', array('name' => $db->sid))
                );

            return redirect('monitor/basededatos');
        }

        return redirect('auth/logout');
    }
	
}