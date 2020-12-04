@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

<div class="d-flex justify-content-center">
    <div class="ch">
        <a href="{{ route('proveedores.show', $modelo->id) }}" class=" btn btn-primary btr"><span class="oi oi-chevron-left"></span></a>
        <b>Regresar</b> <br> <br>

        <h1 class="h1">Formulario de actualización</h1>

        {{ HTML::ul($errors->all()) }}

        {{ Form::model( $modelo, array('route' => array('proveedores.update', $modelo->id), 'method' => 'PUT') ) }}


        <div class="row divf">
            <div class="form-group col-md-12">
                {{ Form::label('proveedor', 'Nombre') }}
                {{ Form::text('proveedor', null, 
                   array('class' => 'form-control ci', 'style' => 'border:4px solid #00FFCC; border-radius:3px;', 'required'=>true)) }}
            </div>
            <div class="form-group col-md-12">
                		{{ Form::label('direccion', 'Direccion') }}
                		{{ Form::text('direccion', Request::old('direccion'),
                   array('class' => 'form-control ci', 'style' => 'border:4px solid #00FFCC; border-radius:3px;', 'required'=>true, 'maxlength'=> 200, 'minlength'=> 5)) }}
            		</div>

            		<div class="form-group col-md-12">
        		        {{ Form::label('telefono', 'Teléfono') }}
        		        {{ Form::number('telefono',	Request::old('telefono'), 
        		           array('class' => 'form-control ci', 'style' => 'border:4px solid #00FFCC; border-radius:3px;', 'required'=>true, 'step'=>'.01')) }}
        		    </div>

        </div>
        <br>

        {{ Form::submit('Actualizar proveedor', array('class' => 'btn btn-primary bt')) }}

        {{ Form::close() }}
    </div>
</div>
@endsection