@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

@if( \Auth::user()->roles_id== 1 ) 
    <a href="{{route('productos.create')}}" class=" btn btn-primary btr"><span class="oi oi-plus"></span></a>
    <b>Nuevo producto</b> <br> <br>
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
                        <th> </th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tableProductos as $rowProducto)
                        <tr>
                            <td> 
                                {{ Form::open(['url' => 'agregarCarrito'] ) }} 

                                {{ Form::hidden('idProducto', $rowProducto->id , array('class' => 'form-control')) }} <br> 

                                {{ Form::text('cantidad', 0 , 
                                array('class' => 'form-control', 'required'=>true)) }} <br>

                                {{ Form::submit('Agregar',['class' => 'btn btn-primary'] ) }}
                                 
                                {{ Form::close()}} 
                            </td>

                            <td>
                                <div class="d-flex align-items-center alto">
                                    <div>
                                        @if( \Auth::user()->roles_id!= 1 )
                                        <p class="a">{{$rowProducto->nombre}}</p>
                                        @else 
                                        <a href="{{route('productos.show', $rowProducto->id)}}" class="a">{{$rowProducto->nombre}} <span class="oi oi-eye"></span></a>
                                        @endif 
                                    </div>
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
