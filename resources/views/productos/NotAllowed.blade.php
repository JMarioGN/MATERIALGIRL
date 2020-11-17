@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

@if( \Auth::user()->roles_id== 1 ) 
    <a href="{{route('productos.create')}}">Registrar producto</a> <br> <br>
    @else 
    No tienes permisos de registrar productos 
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
                    <span class="oi oi-magnifying-glass"></span> Buscar
                </button>
            </form>
        </div> 
        <div class="form-group col-md-9"> 
            <table class="table table-striped table-default">
                <thead class="thead">
                    <tr class="tr">
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tableProductos as $rowProducto)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center alto">
                                    <div>
                                        @if( \Auth::user()->roles_id!= 1 )
                                        <p class="a">{{$rowProducto->nombre}}</p>
                                        @else 
                                        <a href="{{route('proveedores.show', $rowProducto->id)}}" class="a">{{$rowProducto->nombre}}</a>
                                        @endif 
                                    </div>
                                </div>               
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center alto">
                                    <div class="a">{{$rowProducto->categoria_producto}}</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center alto">
                                    <div>
                                        <img src="{{ asset('storage/'.$rowProducto->imgNombreFisico )}}" class="img1">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div> 
</div>
@endsection
