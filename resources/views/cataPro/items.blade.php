@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

<a href="{{route('misCompras')}}" class=" btn btn-primary btr"><span class="oi oi-chevron-left"></span></a><b> Regresar</b> <br><br>

<div class="d-flex justify-content-center">
    <table class="table table-striped table-default tamt">
        <thead class="thead">
            <tr class="tr">
                <th></th>
                <th></th>
                <th>Detalle de articulos</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
               @foreach($items as $row)
                <tr>
                    <td>Foto:</td>
                    <td>Nombre producto:</td>
                    <td>Descripcion:</td> 
                    <td>Precio de venta:</td>
                    <td>Cantidad:</td>
                </tr>
                <tr>
                    <td><img src="{{ asset('storage/'.$row->imgNombreFisico )}}" class="img1" ></td>
                    <td>{{$row->nombre}}</td>
                    <td>{{$row->descripcion}}</td>
                    <td>${{$row->precio_venta}}</td>
                    <td>{{$row->cantidad}}</td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
</div>

@endsection