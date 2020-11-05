@extends('layouts.internal')
@section('content')

<a href="{{ route('detalle_venta.show', $modelo->id) }}">Regresar</a> <br> <br>

<h1>Formulario de actualización</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::model( $modelo, array('route' => array('detalle_venta.update', $modelo->id), 'method' => 'PUT') ) }}


<div class="row">

    <div class="form-group col-md-4">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', Request::old('nombre'),
           array('class' => 'form-control', 'required'=>true, 'maxlength'=> 30)) }}
    </div>

    <div class="form-group col-md-4">
         {{ Form::label('ap', 'Apellido paterno') }}
        {{ Form::text('ap', Request::old('ap'),
           array('class' => 'form-control', 'required'=>true, 'maxlength'=> 30)) }}
    </div>

    <div class="form-group col-md-4">
         {{ Form::label('am', 'Apellido materno') }}
        {{ Form::text('am', Request::old('am'),
           array('class' => 'form-control', 'required'=>true, 'maxlength'=> 30)) }}
    </div>

    
    <div class="form-group col-md-3">
        {{ Form::label('sexo', 'Sexo') }} <br>
        {{ Form::radio('sexo', 1, (Request::old('sexo') == 1), ['id'=>'radioSi', 'class'=>'', 'required'=>true]) }} Hombre <br>
        {{ Form::radio('sexo', 0, (Request::old('sexo') == 0), ['id'=>'radioNo', 'class'=>'', 'required'=>true]) }} Mujer
    </div>

    <div class="form-group col-md-12">
        {{ Form::label('direccion', 'Dirección') }} <br>
        {{ Form::textArea('direccion', Request::old('direccion'),
           array('class' => 'form-control', 'required'=>true, 
           'maxlength'=> 200, 'rows'=>2)) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('telefono', 'Teléfono') }}
        {{ Form::number('telefono', Request::old('telefono'), 
           array('class' => 'form-control', 'required'=>true, 'step'=>'.01')) }}
    </div>

    <div class="form-group col-md-3">
        {{ Form::label('fecha_compra', 'Fecha de compra') }}
        {{ Form::date('fecha_compra', Request::old('fecha_compra'),  
           array('class' => 'form-control')) }}
    </div>

</div>


    {{ Form::submit('Actualizar producto', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection