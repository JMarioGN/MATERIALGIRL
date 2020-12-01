@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

<div class="d-flex justify-content-center">
    <div class="ch">
        <a href="{{ route('detalle_compra.show', $modelo->id) }}" class=" btn btn-primary btr"><span class="oi oi-chevron-left"></span></a>
        <b>Regresar</b> <br> <br>

        <h1 class="h1">Formulario de actualización</h1>

        {{ HTML::ul($errors->all()) }}

        {{ Form::model( $modelo, array('route' => array('compra.update', $modelo->id), 'method' => 'PUT') ) }}


        <div class="row divf">
            <div class="form-group col-md-4">
                {{ Form::label('no_pedido', 'Número de pedido') }}
                {{ Form::number('no_pedido',    Request::old('no_pedido'), 
                   array('class' => 'form-control ci', 'style' => 'border:4px solid #00FFCC; border-radius:3px;', 'required'=>true, 'step'=>'.01')) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('costo_pieza', 'Costo de pieza') }}
                {{ Form::number('costo_pieza',  Request::old('costo_pieza'), 
                   array('class' => 'form-control ci', 'style' => 'border:4px solid #00FFCC; border-radius:3px;', 'required'=>true, 'step'=>'.01')) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('color', 'Color') }}
                {{ Form::text('color', Request::old('color'),
           array('class' => 'form-control ci', 'style' => 'border:4px solid #00FFCC; border-radius:3px;', 'required'=>true, 'maxlength'=> 30, 'minlength'=> 4)) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('fecha_compra', 'Fecha de la compra') }}
                {{ Form::date('fecha_compra', Request::old('fecha_compra'),
           array('class' => 'form-control ci', 'style' => 'border:4px solid #00FFCC; border-radius:3px;', 'required'=>true)) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('marca', 'Marca') }}
                {{ Form::text('marca', Request::old('marca'),
           array('class' => 'form-control ci', 'style' => 'border:4px solid #00FFCC; border-radius:3px;', 'required'=>true, 'maxlength'=> 30, 'minlength'=> 4)) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('modelo', 'Modelo') }}
                {{ Form::text('modelo', Request::old('modelo'),
           array('class' => 'form-control ci', 'style' => 'border:4px solid #00FFCC; border-radius:3px;', 'required'=>true, 'maxlength'=> 30, 'minlength'=> 4)) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('cantidad', 'Cantidad') }}
                {{ Form::number('cantidad', Request::old('cantidad'), 
                   array('class' => 'form-control ci', 'style' => 'border:4px solid #00FFCC; border-radius:3px;', 'required'=>true, 'step'=>'.01')) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('id_producto', 'Nombre del producto') }}
                {{ Form::select('id_producto', $comboProducto, Request::old('id_producto'),  
                   array('class' => 'form-control ci')) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('id_talla', 'Nombre de la talla') }}
                {{ Form::select('id_talla', $comboTalla, Request::old('id_talla'),  
                   array('class' => 'form-control ci')) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('id_detalle_compra', 'Detalle de compra') }}
                {{ Form::select('id_detalle_compra', $comboDetalle, Request::old('id_detalle_compra'),  
                   array('class' => 'form-control ci')) }}
            </div>
        </div>
        <br>

        {{ Form::submit('Actualizar compra', array('class' => 'btn btn-primary bt')) }}

        {{ Form::close() }}
    </div>
</div>
@endsection