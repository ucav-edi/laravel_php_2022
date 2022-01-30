@extends('layouts.layout')
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-info">
                        {{Session::get('success')}}
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nuevo Empleado</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <form method="POST" action="{{ route('empleado.store') }}"  role="form">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del empleado">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="puesto" id="puesto" class="form-control input-sm" placeholder="Puesto">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="edad" id="edad" class="form-control input-sm" placeholder="Edad">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control">Activo</label>
                                            <!---<input type="checkbox" name="activo" id="activo" class="form-control input-sm" placeholder="Empleado activo" value="0">--->
                                            <input type="radio" name="activo" id="activo_si" class="form-control" value="1" >si
                                            <input type="radio" name="activo" id="activo_no" class="form-control" value="0" >no
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <!---<div class="form-group">
                                            <input type="text" name="estado_residencia" id="estado_residencia" class="form-control input-sm" placeholder="Estado de Residencia">
                                        </div>--->
                                        <div class="form-group">
                                            <label for="estado_residencia" class="form-control">Estado</label>
                                            <select id="estado_residencia" class="form-select" name="estado_residencia">
                                                @foreach($estados as $estado)
                                                    <option value='{{$estado->id_estado}}'>{{$estado->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="sueldo" id="sueldo" class="form-control input-sm" placeholder="sueldo">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <!---<input type="text" name="tipo_moneda" id="tipo_moneda" class="form-control input-sm" placeholder="Tipo de moneda">--->
                                            <label for="tipo_moneda" class="form-control">Moneda</label>
                                            <select id="tipo_moneda" class="form-select" name="tipo_moneda">
                                                @foreach($monedas as $moneda)
                                                    <option value='{{$moneda}}'>{{$moneda}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <input type="submit"  value="Guardar" class="btn btn-success btn-block">
                                        <a href="{{ route('empleado.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
@endsection