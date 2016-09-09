<?php namespace Modules\Monitor\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Monitor\Entities\SistemaOperativo;
use Modules\Monitor\Http\Requests\SistemaOperativoRequest;
use Pingpong\Modules\Routing\Controller;

class SistemaOperativoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        if(Auth::user()->can('read-sistemaoperativo')) {
            $sistemasoperativos = SistemaOperativo::all();
            return view('monitor::sistemaoperativo.index', compact('sistemasoperativos'));
        }
        return redirect('auth/logout');
    }

    public function create() {
        if(Auth::user()->can('create-sistemaoperativo')) {
            return view('monitor::sistemaoperativo.create');
        }
        return redirect('auth/logout');
    }
    
    public function store(SistemaOperativoRequest $request) {
        
        if(Auth::user()->can('create-sistemaoperativo')) {
            $data = SistemaOperativo::create($request->all());
            $sistemaoperativo = SistemaOperativo::findOrFail($data->id);
            Session::flash('message', trans('monitor::ui.sistemaoperativo.message_create', array('nombre' => $sistemaoperativo->nombre)));
            return redirect('monitor/sistemaoperativo/create');
        }
        return redirect('auth/logout');
    }
    
     public function destroy($id) {
        if(Auth::user()->can('delete-sistemaoperativo')) {
            $sistemaoperativo = SistemaOperativo::findOrFail($id);
            SistemaOperativo::destroy($id);
            Session::flash('message', trans('monitor::ui.sistemaoperativo.message_delete', array('nombre' => $sistemaoperativo->nombre)));
            return redirect('monitor/sistemaoperativo');
        }
        return redirect('auth/logout');
    }
    
    public function edit($id) {
        if(Auth::user()->can('update-sistemaoperativo')) {
            $sistemaoperativo = SistemaOperativo::findOrFail($id);
            return view('monitor::sistemaoperativo.edit', compact('sistemaoperativo'));
        }
        return redirect('auth/logout');
    }
    
    public function update($id, SistemaOperativoRequest $request) {
        if(Auth::user()->can('update-sistemaoperativo')) {
            $sistemaoperativo = SistemaOperativo::findOrFail($id);
            $sistemaoperativo->update($request->all());
            Session::flash('message', trans('monitor::ui.sistemaoperativo.message_update', array('nombre' => $sistemaoperativo->nombre)));
            return redirect('monitor/sistemaoperativo');
        }
        return redirect('auth/logout');
    }

}