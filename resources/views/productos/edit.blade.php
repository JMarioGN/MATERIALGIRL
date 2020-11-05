@extends('layouts.internal')
@section('content')

<a href="{{ route('productos.show', $modelo->id) }}">Regresar</a> <br> <br>

<h1>Formulario de actualización</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::model( $modelo, array('route' => array('productos.update', $modelo->id), 'method' => 'PUT') ) }}


<div class="row">

    <div class="form-group col-md-4">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', null, 
           array('class' => 'form-control', 'required'=>true)) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('stock', 'Existencias') }}
        {{ Form::number('stock', Request::old('stock'), 
           array('class' => 'form-control', 'required'=>true)) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('precio', 'Precio') }}
        {{ Form::number('precio', Request::old('precio'), 
           array('class' => 'form-control', 'required'=>true, 'step'=>'.01')) }}
    </div>

    <div class="form-group col-md-12">
        {{ Form::label('descripcion', 'Descripción del producto') }} <br>
        {{ Form::textArea('descripcion', Request::old('descripcion'),
           array('class' => 'form-control', 'required'=>true, 
           'maxlength'=> 200, 'rows'=>3)) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('cproducto_id', 'Categoría del producto') }}
        {{ Form::select('cproducto_id', $tablecProductos, $modelo->cproducto_id,  
           array('class' => 'form-control')) }}
    </div>


    <div class="form-group col-md-4">
        {{ Form::label('activo', 'Estatus activo') }}
        {{ Form::checkbox('activo', Request::old('activo'), $modelo->activo,
           array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('venta', 'Disponible para venta') }} <br>
        {{ Form::radio('venta', 1, (Request::old('venta') ? (Request::old('venta') == 1) : ($modelo->venta == 1)  ) , array('id'=>'radioSi', 'class'=>'', 'required'=>true)) }} Sí <br>
        {{ Form::radio('venta', 0, (Request::old('venta') ? (Request::old('venta') == 0) : ($modelo->venta == 0) ), array('id'=>'radioNo', 'class'=>'', 'required'=>true)) }} No
    </div>

</div>


    {{ Form::submit('Actualizar producto', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection