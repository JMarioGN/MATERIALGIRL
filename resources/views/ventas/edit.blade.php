@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

<div class="d-flex justify-content-center">
    <div class="ch">
        <a href="{{ route('compra.show', $modelo->id) }}" class=" btn btn-primary btr"><span class="oi oi-chevron-left"></span></a>
        <b>Regresar</b> <br> <br>

        <h1 class="h1">Formulario de actualización</h1>

        {{ HTML::ul($errors->all()) }}

        {{ Form::model( $modelo, array('route' => array('compra.update', $modelo->id), 'method' => 'PUT') ) }}


        <div class="row divf">
            <div class="form-group col-md-4">
                {{ Form::label('total', 'Total') }}
                {{ Form::number('total',    Request::old('total'), 
                   array('class' => 'form-control ci', 'style' => 'border:4px solid #00FFCC; border-radius:3px;', 'required'=>true, 'step'=>'.01')) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('id_detalle_compra', 'Numero de pedido') }}
                {{ Form::select('id_detalle_compra', $comboDetalle_compra, Request::old('id_detalle_compra'),  
                   array('class' => 'form-control ci')) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('id_proveedor', 'Nombre del proveedor') }}
                {{ Form::select('id_proveedor', $comboProveedor, Request::old('id_proveedor'),  
                   array('class' => 'form-control ci')) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('id_usuario', 'Nombre del empleado') }}
                {{ Form::select('id_usuario', $comboUsuario, Request::old('id_usuario'),  
                   array('class' => 'form-control ci')) }}
            </div>
        </div>
        <br>

        {{ Form::submit('Actualizar compra', array('class' => 'btn btn-primary bt')) }}

        {{ Form::close() }}
    </div>
</div>
@endsection