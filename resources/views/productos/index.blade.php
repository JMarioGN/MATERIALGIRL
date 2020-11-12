@extends('layouts.internal')
@section('content')

<a href="{{route('productos.create')}}">Registrar producto</a> <br> <br>
@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif
<div class="d-flex justify-content-center">
    <table class="table table-hover" style="width: 50%; border-radius: 6px;">
    <thead style="background: #BB8FCE; color: #fff;">
        <tr>
            <th style="text-align: center; font:100 19px arial; border-radius: 6px 0 0 0;">Nombre</th>
            <th style="text-align: center; font:100 19px arial;">Categoría</th>
            <th style="text-align: center; font:100 19px arial; border-radius: 0 6px 0 0;">Foto</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tableProductos as $rowProducto)
            <tr>
                <td style="background: #A3E4D7;">
                    <div  class="d-flex align-items-center" style=" height: 140px;">
                        <div><a href="{{route('productos.show', $rowProducto->id)}}" style="color: #333; font:500 17px arial;">{{$rowProducto->nombre}}</a></div>
                    </div>               
                </td>
                <td style="background: #A3E4D7;">
                    <div class="d-flex align-items-center justify-content-center" style=" height: 140px;">
                        <div style="color: #333; font:500 17px arial;">{{$rowProducto->categoria_producto}}</div>
                    </div>
                </td>
                <td style="background: #A3E4D7;">
                    <div class="d-flex align-items-center justify-content-center" style=" height: 140px;">
                        <div><img src="{{ asset('storage/'.$rowProducto->imgNombreFisico )}}" style="width: 90%; max-width: 190px; height: 150px; border-radius: 4px;" ></div>
                    </div>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>


@endsection
