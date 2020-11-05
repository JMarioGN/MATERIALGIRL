@extends('layouts.internal')
@section('content')

<a href="{{route('detalle_venta.create')}}">Registrar producto</a> <br> <br>
@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>

        </tr>
    </thead>
    <tbody>
        @foreach($tabledetalleV as $row)
            <tr>
                <td>
                    <a href="{{route('detalle_venta.show', $row->id)}}">{{$row->nombre}}</a>
                </td>
                <td>{{$row->fecha_compra}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
