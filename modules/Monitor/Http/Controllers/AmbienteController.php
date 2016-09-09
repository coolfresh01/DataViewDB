<?php namespace Modules\Monitor\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Pingpong\Modules\Routing\Controller;
use Modules\Monitor\Entities\Ambiente;
use Modules\Monitor\Http\Requests\AmbienteRequest;

class AmbienteController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
		
    public function index() {
        
        if(Auth::user()->can('read-ambientes')) {

            $ambientes = Ambiente::all();

            return view('monitor::ambiente.index', compact('ambientes'));
        }

        return redirect('auth/logout');
               
    }
    
    public function create() {

        if(Auth::user()->can('create-ambientes')) {

        return view('monitor::ambiente.create');

        }

        return redirect('auth/logout');
    }
    
    public function store(AmbienteRequest $request) {

        if(Auth::user()->can('create-ambientes')) {

        $data = Ambiente::create($request->all());

        $ambiente = Ambiente::findOrFail($data->id);

        Session::flash('message', trans('monitor::ui.ambiente.message_create', array('nombre' => $ambiente->name)));

        return redirect('monitor/ambiente/create');

        }

        return redirect('auth/logout');
    }
    
    public function destroy($id) {

        if(Auth::user()->can('delete-ambientes')) {

        $ambiente = Ambiente::findOrFail($id);

        Ambiente::destroy($id);

        Session::flash('message', trans('monitor::ui.ambiente.message_delete', array('nombre' => $ambiente->name)));

        return redirect('monitor/ambiente');

        }

        return redirect('auth/logout');
    }
    
    public function edit($id) {

        if(Auth::user()->can('update-ambientes')) {

        $ambiente = Ambiente::findOrFail($id);

        return view('monitor::ambiente.edit', compact('ambiente'));

        }

        return redirect('auth/logout');
    }

    public function update($id, AmbienteRequest $request) {

        if(Auth::user()->can('update-ambientes')) {

        $ambiente = Ambiente::findOrFail($id);

        $ambiente->update($request->all());

        Session::flash('message', trans('monitor::ui.ambiente.message_update', array('nombre' => $ambiente->estado)));

        return redirect('monitor/ambiente');

        }

        return redirect('auth/logout');
    }
	
}