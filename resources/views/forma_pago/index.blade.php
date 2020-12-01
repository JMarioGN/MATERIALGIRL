@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

@if( \Auth::user()->roles_id== 1 ) 
    <a href="{{route('forma_pago.create')}}" class=" btn btn-primary btr"><span class="oi oi-plus"></span></a>
    <b>Nueva forma de pago</b> <br> <br>
    @else 
    No tienes permisos de registrar compra 
    @endif 

    @if(Session::has('message'))
          {{ Session::get('message') }} <br><br>
    @endif

    
<div class="d-flex justify-content-center">
    <div class="row iw"> 
        <div class="form-group col-md-3"> 
            <form class="divf"> 
                <label for="nombre">Filtrar por nombre</label> 
                <input type="text" name="nombre" value="{{$filtroNombre}}" class="form-control ci" style="background: #BB8FCE;"><br>
                <button class="btn btn-primary bt">
                    <span class="oi oi-magnifying-glass" ></span> Buscar
                </button>
            </form>
        </div> 
        <div class="form-group col-md-9"> 
            <table class="table table-striped table-default">
                <thead class="thead">
                    <tr class="tr">
                        <th>ID de usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($table as $row)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        @if( \Auth::user()->roles_id!= 1 )
                                        <p class="a">{{$row->id_usuario}}</p>
                                        @else 
                                        <a href="{{route('forma_pago.show', $row->id)}}" class="a">{{$row->getUser->name}} <span class="oi oi-eye"></span></a>
                                        @endif 
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