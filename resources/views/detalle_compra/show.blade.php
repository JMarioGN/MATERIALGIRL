@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

<a href="{{route('detalle_compra.index')}}" class=" btn btn-primary btr"><span class="oi oi-chevron-left"></span></a><b> Regresar</b> <br><br>

<div class="d-flex justify-content-center">
    <table class="table table-striped table-default tamt">
        <thead class="thead">
            <tr class="tr">
                <th>Detalle de compra</th>
                <th>
                    {{ Form::open(array('url' => route('detalle_compra.destroy', $modelo->id), 'class' => 'pull-right')) }}
                        <a class="btn btn-primary pull-left" href="{{route('detalle_compra.edit', $modelo->id)}}"><span class="oi oi-pencil"></span></a>
                        {{ Form::hidden('_method', 'DELETE') }}
                        <button class="btn btn-danger pull-left" onclick="return confirm('¿Eliminar registro?') "><span class="oi oi-x"></span></button>
                    {{ Form::close() }}
                </th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>Número de pedido</td> 
                    <td>{{$modelo->no_pedido}}</td> 
                </tr>
                    <td>Fecha de registro</td> 
                    <td>{{$modelo->created_at}}</td> 
                </tr>
                <tr>
                    <td>Fecha de modificación</td> 
                    <td>{{$modelo->updated_at}}</td> 
                </tr>
        </tbody>
    </table>
</div>

@endsection