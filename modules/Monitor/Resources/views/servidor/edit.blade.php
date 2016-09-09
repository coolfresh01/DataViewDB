@extends('layouts.master')

@section('content')
    <section class="wrapper">
        @include('partials.message')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('monitor::ui.servidor.edit_server') }}</div>
                        <div class="panel-body">
                            @include('errors.form_error')

                            {!! Form::model($servidor, ['method' => 'PUT', 'class' => 'cmxform form-horizontal', 'id' => 'servidorForm', 'route' => ['monitor.servidor.update', $servidor->id]]) !!}

                            @include('monitor::servidor.form', array('servidor' => $servidor) + compact('ambientes', 'estadosservidor', 'sistemasoperativos'), ['button' => trans('monitor::ui.servidor.button_update')])

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validation/validation-init.js') }}"></script>
@stop