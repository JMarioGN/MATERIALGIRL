@extends('layouts.internal')
@section('content')

<a href="{{route('cproducto.create')}}">Registrar categoria de producto</a> <br> <br>
@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif
<div class="d-flex justify-content-center">
<table class="table table-striped" style="width: 50%; border-radius: 6px;">
    <thead style="background: #BB8FCE; color: #fff;">
        <tr>
            <th style="text-align: center; font:100 19px arial; border-radius: 6px 0 0 0;">Nombre</th>
            <th style="text-align: center; font:100 19px arial; border-radius: 0 6px 0 0;">Foto</th>
        </tr>
    </thead>
    <tbody>
        @foreach($table as $row)
            <tr>
                <td style="background: #48C9B0;">
                    <div  class="d-flex align-items-center" style=" height: 140px;">
                        <div><a href="{{route('productos.show', $row->id)}}" style="color: #333; font:500 17px arial;"> 
                    <a href="{{route('cproducto.show', $row->id)}}">{{$row->nombre}}</a>
                </div>
                </td>
                <td style="background: #48C9B0;">
                <div class="d-flex align-items-center justify-content-center" style=" height: 140px;">
                        <div><img src="{{ asset('storage/'.$row->imgNombreFisico )}}" style="width: 90%; max-width: 190px; height: 150px; border-radius: 4px;" >
                        </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection