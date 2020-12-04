<!-- Icono en pesta単a n -->
    <link rel="shortcut icon" href="{{ asset('images/logol.png') }}" />
@extends('layouts.internal')
@section('content')

	<div class="container text-center">
		<div class="page-header">
			<h1>Confirma tu compra</h1><br>
		</div>

		<div class="page">
			<div class="table-responsive">
				<h3>Datos del usuario</h3>
				<table class="table table-striped table-hover table-bordered">
					<tr class="tr">
						<td>Nombre:</td><td>{{Auth::user()->name." ".Auth::user()->last_name}}</td>
						<td>Correo:</td><td>{{Auth::user()->email}}</td>
						<td>Fecha:</td>
						<td style="width:400px;">
						    {{ Form::open(array('url' => 'compra')) }}
						        <div class="form-group col-md-6">
                                    {{ Form::date('fecha_compra', Request::old('fecha_compra', date("Y-m-d")),
                               array('class' => 'form-control ci', 'style' => 'width=50%;', 'required'=>true, 'disabled' => 'true')) }}
                                </div>
						    {{ Form::close() }}
						    
						</td>
					</tr>
				</table>
			</div><br>
			<div class="table-responsive" >
				<h3>Detalle del pedido:</h3>
				<table class="table table-striped table-hover table-bordered">
					<tr>

						<th>Producto</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
					</tr>
					@foreach($cart as $item)
					<tr>
						<td>{{$item->getProducto->nombre}}</td>
						<td>$ {{number_format($item->costo_pieza*1.30,2)}}</td>
						<td>{{$item->cantidad}}</td>
						<td>$ {{number_format(($item->costo_pieza*1.30*$item->cantidad),2)}}</td>
					</tr>
					@endforeach
				</table>
				<h3><span class="label-succes">Total: $ {{number_format($total, 2)}}</span></h3><hr>
				<p>
					<a href="{{route('cart-show')}}" class="btn btn-primary"><span class="oi oi-chevron-left"></span> Regresar</a>
					<a href="{{route('payment')}}" class="btn btn-warning"><span class="oi oi-credit-card"></span> Pagar con PayPal</a>
				</p>
			</div>
		</div>
	</div>
@stop