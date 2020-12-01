<!-- Icono en pestaña n -->
    <link rel="shortcut icon" href="{{ asset('images/logol.png') }}" />
@extends('layouts.internal')
@section('content')

	<div class="container text-center">
		<div class="page-header">
			<h1>Detalle del pedido</h1>
		</div>

		<div class="page">
			<div class="table-responsive">
				<h3>Datos del usuario</h3>
				<table class="table table-striped table-hover table-bordered">
					<tr>
						<td>Nombre:</td><td>{{Auth::user()->name." ".Auth::user()->last_name}}</td>
						<td>Correo:</td><td>{{Auth::user()->email}}</td>
					</tr>
				</table>
			</div>
			<div class="table-responsive">
				<h3>Datos del pedido</h3>
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