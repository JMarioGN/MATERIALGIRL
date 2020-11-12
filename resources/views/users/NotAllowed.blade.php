@extends('layouts.internal') 
@section('content') 

@if( \Auth::user()->roles_id== 1 ) 
<a href="{{route('users.create')}}">Registrar usuario</a> <br> <br> 
@else 
No tienes permisos de registrar usuarios 
@endif 

@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif
<form> 
    <div class="row"> 
        <div class="form-group col-md-3"> 
            <label for="nombre">Filtrar por nombre</label> 
            <input type="text" name="nombre" value="{{$filtroNombre}}" class="form-control"> 
        </div> 
    </div> 
    <button>Buscar</button> 
</form> 

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tableUsers as $rowUser)
            <tr>
                <td>
                    <a href="{{route('users.show', $rowUser->id)}}">{{$rowUser->name}}</a>
                </td>
                <td>{{$rowUser->email}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
