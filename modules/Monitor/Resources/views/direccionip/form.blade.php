
<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('monitor::ui.direccionip.ip_address') }}</label>
    <div class="col-lg-8">
        {!! Form::text('ip', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('monitor::ui.direccionip.description') }}</label>
    <div class="col-lg-8">
        {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('monitor::ui.servers.name') }}</label>
    <div class="col-lg-8">

        {!! Form::select('servidor_id', $servidores, null, ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">

        {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}

    </div>
</div>

{!! Form::close() !!}
