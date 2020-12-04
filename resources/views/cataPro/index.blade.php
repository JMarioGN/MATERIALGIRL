@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

    
<div class="d-flex flex-column justify-content-center" style="padding: 20px;">
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaC as $row)
        
        <h3>{{$row->nombre}}</h3>
       
        @endforeach
    </div>
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
    	@foreach($consultaC as $row)
    	<img src="{{ asset('storage/'.$row->imgNombreFisico )}}" style="width: 230px; height: 320px; border-radius: 6px;">
    	@endforeach
    </div> 
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaC as $row)
        <h3>$ {{$row->costo_pieza*1.30}}</h3>
        @endforeach
    </div>
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaC as $row)
        <a href="{{route('cataPro.show', $row->id)}}" class="btn btn-primary">Ver detalles</a>
        <a href="{{route('cart-add', $row->id)}}" class="btn btn-info"><span class="oi oi-cart"></span> Añadir al carrito</a>
        @endforeach
    </div>
    <br>
    <br>
    <!-- siguientes 5-8 -->
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCd as $row)
        
        <h3>{{$row->nombre}}</h3>
       
        @endforeach
    </div>
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCd as $row)
        <img src="{{ asset('storage/'.$row->imgNombreFisico )}}" style="width: 230px; height: 320px; border-radius: 6px;">
        @endforeach
    </div> 
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCd as $row)
        <h3>$ {{$row->costo_pieza*1.30}}</h3>
        @endforeach
    </div>
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCd as $row)
        <a href="{{route('cataPro.show', $row->id)}}" class="btn btn-primary">Ver detalles</a>
        <a href="{{route('cart-add', $row->id)}}" class="btn btn-info"><span class="oi oi-cart"></span> Añadir al carrito</a>
        @endforeach
    </div>
    <br>
    <br>
    <!-- siguientes 9-12 -->
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCt as $row)
        
        <h3>{{$row->nombre}}</h3>
       
        @endforeach
    </div>
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCt as $row)
        <img src="{{ asset('storage/'.$row->imgNombreFisico )}}" style="width: 230px; height: 320px; border-radius: 6px;">
        @endforeach
    </div> 
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCt as $row)
        <h3>$ {{$row->costo_pieza*1.30}}</h3>
        @endforeach
    </div>
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCt as $row)
        <a href="{{route('cataPro.show', $row->id)}}" class="btn btn-primary">Ver detalles</a>
        <a href="{{route('cart-add', $row->id)}}" class="btn btn-info"><span class="oi oi-cart"></span> Añadir al carrito</a>
        @endforeach
    </div>
     <br>
    <br>
    <!-- siguientes 13-16 -->
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCcu as $row)
        
        <h3>{{$row->nombre}}</h3>
       
        @endforeach
    </div>
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCcu as $row)
        <img src="{{ asset('storage/'.$row->imgNombreFisico )}}" style="width: 230px; height: 320px; border-radius: 6px;">
        @endforeach
    </div> 
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCcu as $row)
        <h3>$ {{$row->costo_pieza*1.30}}</h3>
        @endforeach
    </div>
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCcu as $row)
        <a href="{{route('cataPro.show', $row->id)}}" class="btn btn-primary">Ver detalles</a>
        <a href="{{route('cart-add', $row->id)}}" class="btn btn-info"><span class="oi oi-cart"></span> Añadir al carrito</a>
        @endforeach
    </div>
     <br>
    <br>
    <!-- siguientes 17-20 -->
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCci as $row)
        
        <h3>{{$row->nombre}}</h3>
       
        @endforeach
    </div>
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCci as $row)
        <img src="{{ asset('storage/'.$row->imgNombreFisico )}}" style="width: 230px; height: 320px; border-radius: 6px;">
        @endforeach
    </div> 
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCci as $row)
        <h3>$ {{$row->costo_pieza*1.30}}</h3>
        @endforeach
    </div>
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCci as $row)
        <a href="{{route('cataPro.show', $row->id)}}" class="btn btn-primary">Ver detalles</a>
        <a href="{{route('cart-add', $row->id)}}" class="btn btn-info"><span class="oi oi-cart"></span> Añadir al carrito</a>
        @endforeach
    </div>
     <br>
    <br>
    <!-- siguientes 21-24 -->
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCs as $row)
        
        <h3>{{$row->nombre}}</h3>
       
        @endforeach
    </div>
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCs as $row)
        <img src="{{ asset('storage/'.$row->imgNombreFisico )}}" style="width: 230px; height: 320px; border-radius: 6px;">
        @endforeach
    </div> 
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCs as $row)
        <h3>$ {{$row->costo_pieza*1.30}}</h3>
        @endforeach
    </div>
    <div class="d-flex justify-content-around" style="padding: 4px; width: 90%;">
        @foreach($consultaCs as $row)
        <a href="{{route('cataPro.show', $row->id)}}" class="btn btn-primary">Ver detalles</a>
        <a href="{{route('cart-add', $row->id)}}" class="btn btn-info"><span class="oi oi-cart"></span> Añadir al carrito</a>
        @endforeach
    </div>
</div>

@endsection
