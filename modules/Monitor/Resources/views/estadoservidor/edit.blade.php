@extends('layouts.master')

@section('content')
    <section class="wrapper">
        @include('partials.message')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('monitor::ui.estadoservidor.edit_brand') }}</div>
                        <div class="panel-body">
                            @include('errors.form_error')

                            {!! Form::model($estadoservidor, ['method' => 'PUT', 'route' => ['monitor.estadoservidor.update', $estadoservidor->id], 'class' => 'cmxform form-horizontal', 'id' => 'nameForm']) !!}

                            @include('monitor::estadoservidor.form', ['button' => trans('monitor::ui.estadoservidor.button_update')])

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