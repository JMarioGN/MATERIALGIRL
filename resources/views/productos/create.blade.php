@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

<div class="d-flex justify-content-center">
    <div class="ch">
        <a href="{{ URL::to('productos') }}" class=" btn btn-primary btr"><span class="oi oi-chevron-left"></span></a>
        <b>Regresar</b> <br> <br>

        <h1 class="h1">Formulario de creación</h1>

        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => 'productos', 'enctype' => 'multipart/form-data')) }}

        <div class="row divf">
            <div class="form-group col-md-4">
                {{ Form::label('nombre', 'Nombre del producto') }}
                {{ Form::text('nombre', Request::old('nombre'),
                   array('class' => 'form-control ci', 'required'=>true, 'maxlength'=> 30)) }}
            </div>

            <div class="form-group col-md-4">
                {{ Form::label('cproducto_id', 'Categoría del producto') }}
                {{ Form::select('cproducto_id', $tablecProductos, Request::old('cproducto_id'),  
                   array('class' => 'form-control ci')) }}
            </div>

            <div class="form-group col-md-4">
                {{ Form::label('activo', 'Estatus activo') }}
                {{ Form::checkbox('activo', Request::old('activo'), false,  
                   array('class' => 'form-control',)) }}
            </div>

            <div class="form-group col-md-4">
                {{ Form::label('venta', 'Disponible para venta') }} <br>
                {{ Form::radio('venta', 1, (Request::old('venta') == 1), ['id'=>'radioSi', 'class'=>'', 'required'=>true]) }} Sí <br>
                {{ Form::radio('venta', 0, (Request::old('venta') == 0), ['id'=>'radioNo', 'class'=>'', 'required'=>true]) }} No
            </div>

            <div class="form-group col-md-8">
                {{ Form::label('descripcion', 'Descripción del producto') }} <br>
                {{ Form::textArea('descripcion', Request::old('descripcion'),
                   array('class' => 'form-control ci', 'required'=>true, 
                   'maxlength'=> 200, 'rows'=>2)) }}
            </div>

            <div class="form-group col-md-4"> 
                {{ Form::label('imagen', 'Imagen')}} <br> 
                {{ Form::file('imagen', ['accept'=>"image/x-png,image/gif,image/jpeg", 'class' => 'cimg']) }} <br>
            </div>
        </div>
        <br>
        {{ Form::submit('Registrar producto', ['class' => 'btn btn-primary bt'] ) }}

        {{ Form::close() }}
    </div>
</div>

@endsection
