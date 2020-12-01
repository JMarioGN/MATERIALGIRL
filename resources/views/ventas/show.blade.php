@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

<a href="{{route('ventas.index')}}" class=" btn btn-primary btr"><span class="oi oi-chevron-left"></span></a><b> Regresar</b> <br><br>

<div class="d-flex justify-content-center">
    <table class="table table-striped table-default tamt">
        <thead class="thead">
            <tr class="tr">
                <th>Productos vendidos</th>
                <th>
                    <!--
                    {{ Form::open(array('url' => route('ventas.destroy', $modelo->id), 'class' => 'pull-right')) }}
                        <a class="btn btn-primary pull-left" href="{{route('ventas.edit', $modelo->id)}}"><span class="oi oi-pencil"></span></a>
                        {{ Form::hidden('_method', 'DELETE') }}
                        <button class="btn btn-danger pull-left" onclick="return confirm('¿Eliminar registro?') "><span class="oi oi-x"></span></button>
                    {{ Form::close() }}
                -->
                </th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
               @foreach($detalleItems as $row)
                <tr>
                    <td>Nombre producto:</td> 
                    <td>Foto:</td>
                    <td>Cantidad:</td> 
                    <td>Precio de venta:</td>
                </tr>
                <tr>
                    <td>{{$row->nombre}}</td>
                    <td><img src="{{ asset('storage/'.$row->imgNombreFisico )}}" class="img1" ></td>
                    <td>${{$row->cantidad}}</td>
                    <td>{{$row->precio_venta}}</td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
</div>

@endsection