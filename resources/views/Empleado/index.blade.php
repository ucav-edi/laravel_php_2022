@extends('layouts.layout')
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>Lista Empleados</h3></div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('empleado.create') }}" class="btn btn-info" >Añadir Empleado</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>Nombre</th>
                                <th>Puesto</th>
                                <th>Edad</th>
                                <th>Activo</th>
                                <!--se agregan campos sueldo y moneda
                                -->
                                <th>Estado</th>
                                <th>Sueldo</th>
                                <th>Moneda</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                </thead>
                                <tbody>
                                @if($empleados->count())
                                    @foreach($empleados as $empleado)
                                        <tr>
                                            <td>{{$empleado->nombre}}</td>
                                            <td>{{$empleado->puesto}}</td>
                                            <td>{{$empleado->edad}}</td>
                                            <td>{{$empleado->activo ? 'SI':'NO'}}</td>
                                            <!--Se Activan campos para estado, sueldo y moneda
                                            -->
                                            <td>
                                                @foreach($estados as $estado)
                                                    @if($estado->id_estado == $empleado->estado_residencia)
                                                        {{$estado->nombre}}
                                                        @break
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$empleado->sueldo}}</td>
                                            <td>{{$empleado->tipo_moneda}}</td>
                                            <td><a class="btn btn-primary btn-xs" href="{{action('EmpleadoController@edit', $empleado->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                            <td>
                                                <form action="{{action('EmpleadoController@destroy', $empleado->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">

                                                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">No hay registro !!</td>
                                    </tr>
                                @endif
                                </tbody>

                            </table>
                        </div>
                    </div>
                    {{ $empleados->links() }}
                </div>
            </div>
        </section>

@endsection