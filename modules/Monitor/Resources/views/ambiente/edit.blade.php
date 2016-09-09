@extends('layouts.master')

@section('content')
    <section class="wrapper">
        @include('partials.message')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('monitor::ui.ambiente.edit_brand') }}</div>
                        <div class="panel-body">
                            @include('errors.form_error')

                            {!! Form::model($ambiente, ['method' => 'PUT', 'route' => ['monitor.ambiente.update', $ambiente->id], 'class' => 'cmxform form-horizontal', 'id' => 'nameForm']) !!}

                            @include('monitor::ambiente.form', ['button' => trans('monitor::ui.ambiente.button_update')])

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