@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

<div class="d-flex justify-content-center">
        <div class="form-group col-md-9"> 
            <table class="table table-striped table-default">
                <thead class="thead">
                    <tr>
                        <th></th>
                        <th>Mis compras</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $row)
                        <tr>
                            <td>Usuario:</td>
                            <td>Costo de envio:</td>
                            <td>Total:</td>
                            <td>Fecha de compra:</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                {{\Auth::user()->name}}
                            </td>
                            <td>$ {{$row->costoE}}</td>
                            <td>$ {{$row->total}}</td>
                            <td>{{$row->created_at}}</td>
                            <td><a href="{{route('items', \Auth::user()->id)}}" class="btn btn-primary"><span class="oi oi-list"></span> Lista de articulos</a></td>
                            <td><a href="{{route('ex', $row->id)}}" class="btn btn-info"><span class="oi oi-document"></span>  Reporte de compras</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div> 
</div>

@endsection