<?php namespace Modules\Monitor\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Pingpong\Modules\Routing\Controller;
use Modules\Monitor\Entities\EstadoDb;
use Modules\Monitor\Http\Requests\EstadoDbRequest;

class EstadoDbController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        
        if(Auth::user()->can('read-estadosdb')) {

            $estadosdb = EstadoDb::all();

            return view('monitor::estadodb.index', compact('estadosdb'));
        }

        return redirect('auth/logout');
               
    }
    
    public function create() {

        if(Auth::user()->can('create-estadosdb')) {

        return view('monitor::estadodb.create');

        }

        return redirect('auth/logout');
    }
    
    public function store(EstadoDbRequest $request) {

        if(Auth::user()->can('create-estadosdb')) {

        $data = EstadoDb::create($request->all());

        $estadodb = EstadoDb::findOrFail($data->id);

        Session::flash('message', trans('monitor::ui.estadodb.message_create', array('estado' => $estadodb->name)));

        return redirect('monitor/estadodb/create');

        }

        return redirect('auth/logout');
    }
    
    public function destroy($id) {

        if(Auth::user()->can('delete-estadosdb')) {

        $estadodb = EstadoDb::findOrFail($id);

        EstadoDb::destroy($id);

        Session::flash('message', trans('monitor::ui.estadodb.message_delete', array('estado' => $estadodb->name)));

        return redirect('monitor/estadodb');

        }

        return redirect('auth/logout');
    }
    
    public function edit($id) {

        if(Auth::user()->can('update-estadosdb')) {

        $estadodb = EstadoDb::findOrFail($id);

        return view('monitor::estadodb.edit', compact('estadodb'));

        }

        return redirect('auth/logout');
    }

    public function update($id, EstadoDbRequest $request) {

        if(Auth::user()->can('update-estadosdb')) {

        $estadodb = EstadoDb::findOrFail($id);

        $estadodb->update($request->all());

        Session::flash('message', trans('monitor::ui.estadodb.message_update', array('estado' => $estadodb->estado)));

        return redirect('monitor/estadodb');

        }

        return redirect('auth/logout');
    }
    
	
}