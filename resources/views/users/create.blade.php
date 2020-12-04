@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

<div class="d-flex justify-content-center">
    <div class="ch">
        <a href="{{ URL::to('users') }}" class=" btn btn-primary btr"><span class="oi oi-chevron-left"></span></a>
        <b>Regresar</b> <br> <br>

        <h1 class="h1">Formulario de creación</h1>

        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => 'users')) }}
        <div class="row divf">
            <div class="form-group col-md-12">
                {{ Form::label('name', 'Nombre') }}
                {{ Form::text('name', Request::old('name'), 
                   array('class' => 'form-control ci', 'required'=>true)) }}
            </div>

            <div class="form-group col-md-12">
                {{ Form::label('password', 'Contraseña') }}
                {{ Form::input('password', 'password', '', array('class' => 'form-control ci')) }}
            </div>

            <div class="form-group col-md-12">
                {{ Form::label('email', 'Correo electrónico') }}
                {{ Form::email('email', Request::old('email'), array('class' => 'form-control ci', 'required'=>true)) }}
            </div>
            <div class="form-group col-md-12">
                {{ Form::label('roles_id', 'Rol del usuario') }}
                {{ Form::select('roles_id', $tablero1, Request::old('roles_id'),  
                   array('class' => 'form-control ci')) }}
            </div>
            {{ Form::submit('Registrar usuario', array('class' => 'btn btn-primary bt')) }}

        </div>

        {{ Form::close() }}
    </div>
</div>

@endsection