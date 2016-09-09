@extends('layouts.master')

        @section('content')

        <!--body wrapper start-->
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <!--{{ trans('monitor::ui.servers.data') }}-->
                        <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            <table  class="table table-hover">
                                <thead>
                                <tr>
                                    <th>{{ trans('monitor::ui.servers.server_name') }}</th>
                                    <th>{{ trans('monitor::ui.servers.server_enviroment') }}</th>
                                    <th>{{ trans('monitor::ui.servers.server_so') }}</th>
                                    <th>{{ trans('monitor::ui.servers.server_ram') }}</th>           
                                    <th>{{ trans('monitor::ui.servers.server_state') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($servidores as $data)
                                    <tr class="gradeX">
                                        <td>{{ $data->servidor }}</td>
                                        <td>{{ $data->ambiente }}</td>
                                        <td>{{ $data->sistema_operativo }}</td>
                                        <td>{{ $data->RAM }}</td>
                                        <td>{{ $data->estado_servidor }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>
    @stop
