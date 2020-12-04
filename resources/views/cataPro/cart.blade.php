<!-- Icono en pestaña n -->
    <link rel="shortcut icon" href="{{ asset('images/logol.png') }}" />
<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery.min.js"></script>
@extends('layouts.internal')

	<div class="container text-center">
		<div class="page-header">
			<h1>Carrito de compras</h1>
		</div>
		@if(count($cart))
		<p>
			<a href="{{route('cart-vaciar')}}" class="btn btn-danger"><span class="oi oi-trash"></span>Vaciar carrito</a>
		</p>
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
					<th>Imagen</th>
					<th>Producto</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Subtotal</th>
					<th>Quitar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($cart as $item)
				<tr>
					<td><img src="{{ asset('storage/'.$item->getProducto->imgNombreFisico )}}" class="img1"></td>
					<td>{{$item->getProducto->nombre}}</td>
					<td>{{number_format($item->costo_pieza*1.30,2)}}</td>
					<td>
						<input 
							type="number" 
							min="1" 
							max="{{$c->cantidad}}" 
							value="{{$item->cantidad}}" 
							id="producto_{{$item->id}}"
						>
						<a 
							href="#" 
							class="btn btn-warning btn-update-item" 
							data-href="{{route('cart-update', $item->id)}}" 
							data-id="{{$item->id}}"
							onclick="upda()" 
						>
							<span class="oi oi-loop-circular"></span>
						</a>
					</td>
					<td>{{number_format(($item->costo_pieza*1.30*$item->cantidad),2)}}</td>
					<td><a href="{{route('cart-delete', $item->id_producto)}}" class="btn btn-danger"><span class="oi oi-x"></span></a></td>
				</tr>
				@endforeach
			</tbody>

			</table>
			<h3>Total: $ {{number_format($total, 2)}}</h3>
		</div>
		@else
			<h3>No hay productos en el carrito</h3>
		@endif
		<hr>
		<p>
			<a href="{{route('cataPro.index')}}" class="btn btn-primary"><span class="oi oi-chevron-left"></span> Seguir comprando</a>
			<a href="{{route('order-detail')}}" class="btn btn-primary"><span class="oi oi-chevron-right"></span> Continuar</a>
		</p>
	</div>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>