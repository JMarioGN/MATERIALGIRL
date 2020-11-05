@extends('layouts.internal')
@section('content')

<a href="{{route('productos.create')}}">Registrar producto</a> <br> <br>
@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Categoría</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tableProductos as $rowProducto)
            <tr>
                <td>
                    <a href="{{route('productos.show', $rowProducto->id)}}">{{$rowProducto->nombre}}</a>
                </td>
                <td>{{$rowProducto->categoria_producto}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
