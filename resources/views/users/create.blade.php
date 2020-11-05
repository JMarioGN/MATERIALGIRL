@extends('layouts.internal')
@section('content')

<a href="{{ URL::to('users') }}">Regresar</a> <br> <br>

<h1>Formulario de creación</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'users')) }}
<div class="row">

    <div class="form-group col-md-4">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', Request::old('name'), 
           array('class' => 'form-control', 'required'=>true)) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('password', 'Contraseña') }}
        {{ Form::text('password', Request::old('password'), array('class' => 'form-control', 'required'=>true)) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('email', 'Correo electrónico') }}
        {{ Form::email('email', Request::old('email'), array('class' => 'form-control', 'required'=>true)) }}
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('roles_id', 'Rol del usuario') }}
        {{ Form::select('roles_id', $tablero1, Request::old('roles_id'),  
           array('class' => 'form-control')) }}
    </div>

    <div class="col-md-12">
        {{ Form::submit('Registrar usuario', array('class' => 'btn btn-primary')) }}
    </div>

</div>

{{ Form::close() }}


@endsection