@extends('layouts.internal')
@section('content')

<!-- CSS diseño -->
<link href="{{ asset('css/f.css') }}" rel="stylesheet">
<!-- ICONOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

<a href="{{route('users.index')}}" class=" btn btn-primary btr"><span class="oi oi-chevron-left"></span></a><b> Regresar</b> <br><br>

<div class="d-flex justify-content-center">
    <table class="table table-striped table-default tamt">
        <thead class="thead">
            <tr class="tr">
                <th>Información del usuario</th>
                <th>
                    {{ Form::open(array('url' => route('users.destroy', $modelo->id), 'class' => '')) }}
                        <a class="btn btn-primary pull-left" href="{{route('users.edit', $modelo->id)}}"><span class="oi oi-pencil"></span></a>
                        {{ Form::hidden('_method', 'DELETE') }}
                        <button class="btn btn-danger pull-left"><span class="oi oi-x"></span></button> 
                        
                    {{ Form::close() }}
                </th>
            </tr>
        </thead>
        <tbody>
                <tr><td> Nombre de usuario </td> <td>{{$modelo->name}}</td></tr>
                <tr><td> Email </td> <td>{{$modelo->email}}</td></tr>
                <tr><td> Fecha de registro </td> <td>{{$modelo->created_at}}</td></tr>
                <tr><td> Fecha de modificación </td> <td>{{$modelo->updated_at}}</td></tr>
        </tbody>
    </table>
</div>

@endsection