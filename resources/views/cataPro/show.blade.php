@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

    
<div class="d-flex flex-row justify-content-center">
    <div style="display: flex; justify-content: flex-end;">
        <img src="{{ asset('storage/'.$modelo->imgNombreFisico )}}" style="width: 90%; height: 500px; border-radius: 6px;">
    </div> 

    <div style="background: #eee; padding: 100px;" >
        <h1>{{$modelo->nombre}}</h1>
        <p style="text-align: justify; width: 40%;">{{$modelo->descripcion}}</p>
        @foreach($consultaC as $row)
        <h2>$ {{$row->costo_pieza*1.30}}</h2>
        <a href="{{route('cart-add', $row->id)}}" class="btn btn-primary"><span class="oi oi-cart"></span>Añadir al carrito</a>
        @endforeach
    </div> 
</div>

@endsection
