@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

<a href="{{route('detalle_compra.index')}}" class=" btn btn-primary btr"><span class="oi oi-chevron-left"></span></a><b> Regresar</b> <br><br>

<div class="d-flex justify-content-center">
    <table class="table table-striped table-default">
        <thead class="thead">
            <tr>
                <th>{{$modelo->detalle}}</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>
                    {{ Form::open(array('url' => route('detalle_compra.destroy', $modelo->id), 'class' => 'pull-right')) }}
                        <a class="btn btn-primary pull-left" href="{{route('detalle_compra.edit', $modelo->id)}}"><span class="oi oi-pencil"></span></a>
                        {{ Form::hidden('_method', 'DELETE') }}
                        <button class="btn btn-danger pull-left" onclick="return confirm('¿Eliminar registro?') "><span class="oi oi-x"></span></button>
                    {{ Form::close() }}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($detalleItems as $row)
                <tr>
                    <td>Foto:</td>
                    <td>Nombre producto:</td> 
                    <td>Cantidad:</td>
                    <td>Costo:</td> 
                    <td>Marca:</td> 
                    <td>Modelo:</td> 
                    <td>Talla:</td> 
                    <td></td>
                </tr>
                <tr>
                    <p>{{$row->id}}</p>
                    <td><img src="{{ asset('storage/'.$row->imgNombreFisico )}}" class="img1"></td>
                    <td><a href="{{route('compra.edit', $row->id)}}">{{$row->nombre}}</a></td>
                    <td>{{$row->cantidad}}</td>
                    <td>{{$row->costo_pieza}}</td>
                    <td>{{$row->marca}}</td>
                    <td>{{$row->modelo}}</td>
                    <td>{{$row->talla}}</td>
                    <td>
                        {{ Form::open(array('url' => route('compra.destroy', $modelo->id), 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        <button class="btn btn-danger pull-left" onclick="return confirm('¿Eliminar registro?') "><span class="oi oi-x"></span></button>
                    {{ Form::close() }}
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>    
</div>

@endsection