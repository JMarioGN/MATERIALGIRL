@extends('layouts.internal')
@section('content')

<a href="{{ route('cproducto.show', $modelo->id) }}">Regresar</a> <br> <br>

<h1>Formulario de actualización</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::model( $modelo, array('route' => array('cproducto.update', $modelo->id), 'method' => 'PUT') ) }}


<div class="row">

    <div class="form-group col-md-4">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', null, 
           array('class' => 'form-control', 'required'=>true)) }}
    </div>

    

    <div class="form-group col-md-4">
        {{ Form::label('activo', 'Estatus activo') }}
        {{ Form::checkbox('activo', Request::old('activo'), $modelo->activo,
           array('class' => 'form-control')) }}
    </div>

</div>


    {{ Form::submit('Actualizar categoria de producto', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection