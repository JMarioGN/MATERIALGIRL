@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

<div class="d-flex justify-content-center">
	<div class="ch">
		<a href="{{ route('talla.show', $modelo->id) }}" class=" btn btn-primary btr"><span class="oi oi-chevron-left"></span></a>
        <b>Regresar</b> <br> <br>

		<h1 class="h1">Formulario de actualización</h1>

		{{ HTML::ul($errors->all()) }}

		{{ Form::model( $modelo, array('route' => array('talla.update', $modelo->id), 'method' => 'PUT') ) }}


		<div class="row divf">

		    <div class="form-group col-md-12">
		        {{ Form::label('talla', 'Nombre') }}
		        {{ Form::text('talla', null, 
		           array('class' => 'form-control ci', 'required'=>true)) }}
		    </div>

		</div>
		<br>

		    {{ Form::submit('Actualizar talla', array('class' => 'btn btn-primary bt')) }}

		{{ Form::close() }}
	</div>
</div>

@endsection