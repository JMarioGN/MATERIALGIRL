@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

<div class="d-flex justify-content-center">
    <div class="ch">
        <a href="{{ URL::to('cproducto') }}" class=" btn btn-primary btr"><span class="oi oi-chevron-left"></span></a>
        <b>Regresar</b> <br> <br>

        <h1 class="h1">Formulario de creación</h1>

        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => 'cproducto','enctype'=> 'multipart/form-data')) }}

        <div class="row divf">
            <div class="form-group col-md-6">
                {{ Form::label('nombre', 'Nombre de la categoria del producto') }}
                {{ Form::text('nombre', Request::old('nombre'),
                   array('class' => 'form-control ci', 'required'=>true, 'maxlength'=> 30, 'minlength'=> 5)) }}
            </div>

            <div class="form-group col-md-6">
                {{ Form::label('activo', 'Estatus activo') }}
                {{ Form::checkbox('activo', Request::old('activo'), false,  
                   array('class' => 'form-control ci')) }}
            </div>

            <div class="form-group col-md-12"> 
                {{ Form::label('imagen', 'Imagen')}} <br> 
                {{ Form::file('imagen', ['accept'=>"image/x-png,image/gif,image/jpeg", 'class' => 'cimg']) }} <br>
            </div>

        </div>
        <br>
        {{ Form::submit('Registrar categoria de producto', ['class' => 'btn btn-primary bt'] ) }}

        {{ Form::close() }}
    </div>
</div>

@endsection