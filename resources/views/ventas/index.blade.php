@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

@if( \Auth::user()->roles_id== 1 ) 
    <a href="{{route('ventas.create')}}" class=" btn btn-primary btr"><span class="oi oi-plus"></span></a>
    <b>Nueva venta</b> <br> <br>
    @else 
    No tienes permisos de registrar venta 
    @endif 

    @if(Session::has('message'))
          {{ Session::get('message') }} <br><br>
    @endif

    
<div class="d-flex justify-content-center">
    <div class="row iw"> 
        <div class="form-group col-md-3"> 
            <form class="divf"> 
                <label for="nombre">Filtrar por nombre</label> 
                <input type="text" name="nombre" value="{{$filtroNombre}}" class="form-control ci"><br>
                <button class="btn btn-primary bt">
                    <span class="oi oi-magnifying-glass" ></span> Buscar
                </button>
            </form>
        </div> 
        <div class="form-group col-md-9"> 
            <table class="table table-striped table-default">
                <thead class="thead">
                    <tr>
                        <th></th>
                        <th>Ventas</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($table as $row)
                        <tr>
                            <td>Usuario:</td>
                            <td>Costo de envio:</td>
                            <td>Total:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{route('ventas.show', $row->id)}}" class="a">{{$row->getUser->name}} <span class="oi oi-eye"></span></a>             
                            </td>
                            <td>$ {{$row->costoE}}</td>
                            <td>$ {{($row->costoE + $row->total)}}</td>
                            <td>
                                <a href="{{route('v', $row->id)}}" class="btn btn-primary"><span class="oi oi-document"></span> Reporte </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div> 
</div>
@endsection