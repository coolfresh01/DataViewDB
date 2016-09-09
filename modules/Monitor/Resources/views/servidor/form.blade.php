<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('monitor::ui.servidor.name') }}</label>
    <div class="col-lg-8">
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('monitor::ui.servidor.server_ram') }}</label>
    <div class="col-lg-8">
        {!! Form::text('RAM', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('monitor::ui.ambiente.name') }}</label>
    <div class="col-lg-8">

        {!! Form::select('ambiente_id', $ambientes, null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('monitor::ui.estadoservidor.name') }}</label>
    <div class="col-lg-8">

        {!! Form::select('estado_servidor_id', $estadosservidor, null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('monitor::ui.sistemaoperativo.name') }}</label>
    <div class="col-lg-8">

        {!! Form::select('sistema_operativo_id', $sistemasoperativos, null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">

        {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}

    </div>
</div>

{!! Form::close() !!}