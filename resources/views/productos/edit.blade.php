@extends('layouts.internal')
@section('content')
<div style="display: flex; justify-content: center; align-items:center;">
    <div style="width: 50%;">

        <a href="{{ route('productos.show', $modelo->id) }}">Regresar</a> <br> <br>

    <h1 style="color: #000; text-align: center;">Formulario de actualización</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::model( $modelo, array('route' => array('productos.update', $modelo->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data') ) }}


<div class="row" style="background-image: url({{ asset('images/fondoMd.jpg')}}); background-size: cover; border-radius: 4px; color:#fff; font:500 17px arial; padding: 12px 15px;">

    <div class="form-group col-md-4">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', null, 
           array('class' => 'form-control','style' => 'border:4px solid #00FFCC; border-radius:3px;', 'required'=>true)) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('stock', 'Existencias') }}
        {{ Form::number('stock', Request::old('stock'), 
           array('class' => 'form-control', 'style' => 'border:4px solid #00FFCC; border-radius:3px;', 'required'=>true)) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('precio', 'Precio') }}
        {{ Form::number('precio', Request::old('precio'), 
           array('class' => 'form-control', 'style' => 'border:4px solid #00FFCC; border-radius:3px;', 'required'=>true, 'step'=>'.01')) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('cproducto_id', 'Categoría del producto') }}
        {{ Form::select('cproducto_id', $tablecProductos, $modelo->cproducto_id,  
           array('class' => 'form-control','style' => 'border:4px solid #00FFCC; border-radius:3px;')) }}
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

    <div class="form-group col-md-12">
        {{ Form::label('descripcion', 'Descripción del producto') }} <br>
        {{ Form::textArea('descripcion', Request::old('descripcion'),
           array('class' => 'form-control','style' => 'border:4px solid #00FFCC; border-radius:3px;', 'required'=>true, 
           'maxlength'=> 200, 'rows'=>3)) }}
    </div>
    <div class="form-group col-md-2">
    </div>
    <div class="form-group col-md-8"> 
        {{ Form::label('imagen', 'Imagen')}} <br> 
        <img src="{{ asset('storage/'.$modelo->imgNombreFisico )}}" style="width: 90%; max-width: 480px; border-radius: 6px;"><br><br>
        {{ Form::file('imagen', ['accept'=>"image/x-png,image/gif,image/jpeg",'style' => 'background: #00FFCC; border-radius:4px; padding:10px;']) }} <br>
    </div> 
    <div class="form-group col-md-2">
    </div>


</div>
<br>

    {{ Form::submit('Actualizar producto', array('style' => 'background: linear-gradient(to right, rgba(203,96,179,1) 0%, rgba(193,70,161,1) 0%, rgba(168,0,119,1) 70%, rgba(95,22,116,1) 100%); color:#fff; border-radius:4px; padding:15px 35px;')) }}

{{ Form::close() }}
    </div>
    
</div>

@endsection