@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">


@if( \Auth::user()->roles_id== 1 ) 
    <a href="{{route('users.create')}}">Registrar usuario</a> <br> <br> 
    @else 
    No tienes permisos de registrar usuarios 
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
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tableUsers as $rowUser)
                        <tr>
                            <td>
                                @if( \Auth::user()->roles_id!= 1 )
                                <p class="a">{{$rowUser->name}}</p>
                                @else 
                                <a href="{{route('proveedores.show', $row->id)}}" class="a">{{$rowUser->name}}</a>
                                @endif 
                            </td>
                            <td>{{$rowUser->email}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div> 
</div>
@endsection
