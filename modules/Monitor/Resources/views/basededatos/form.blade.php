<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('monitor::ui.database.sid') }}</label>
    <div class="col-lg-8">
        {!! Form::text('sid', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('monitor::ui.database.description') }}</label>
    <div class="col-lg-8">
        {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('monitor::ui.servidor.name') }}</label>
    <div class="col-lg-8">

        {!! Form::select('servidor_id', $servidores, null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('monitor::ui.estadodb.name') }}</label>
    <div class="col-lg-8">

        {!! Form::select('estado_db_id', $estadosdb, null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">

        {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}

    </div>
</div>

{!! Form::close() !!}