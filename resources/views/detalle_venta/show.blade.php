@extends('layouts.internal')
@section('content')


<a href="{{route('detalle_venta.index')}}">Inicio</a> <br><br>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Información del detalle de venta</th>
            <th>
                {{ Form::open(array('url' => route('detalle_venta.destroy', $modelo->id), 'class' => 'pull-right')) }}
                    <a class="btn btn-primary" href="{{route('detalle_venta.edit', $modelo->id)}}">Editar</a>
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Borrar', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </th>
        </tr>
    </thead>
    <tbody>
            <tr><td> Nombre</td> <td>{{$modelo->nombre}}</td></tr>
            <tr><td> Apellido paterno</td> <td>{{$modelo->ap}}</td></tr>
            <tr><td> Apellido materno</td> <td>{{$modelo->am}}</td></tr>
            <tr><td> Sexo </td> <td> @if($modelo->sexo) Hombre @else Mujer @endif </td></tr>
            <tr><td> Dirección</td> <td>{{$modelo->direccion}}</td></tr>
            <tr><td> Teléfono</td> <td>{{$modelo->telefono}}</td></tr>
            <tr><td> Fecha de compra </td> <td>{{$modelo->fecha_compra}}</td></tr>
            <tr><td> Fecha de registro </td> <td>{{$modelo->created_at}}</td></tr>
            <tr><td> Fecha de modificación </td> <td>{{$modelo->updated_at}}</td></tr>
    </tbody>

</table>


@endsection