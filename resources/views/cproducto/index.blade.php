@extends('layouts.internal')
@section('content')

<a href="{{route('cproducto.create')}}">Registrar categoria de producto</a> <br> <br>
@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        @foreach($table as $row)
            <tr>
                <td>
                    <a href="{{route('cproducto.show', $row->id)}}">{{$row->nombre}}</a>
                </td>
                <td>
                    <div class="d-flex align-items-center justify-content-center" style=" height: 140px;">
                        <div><img src="{{ asset('storage/'.$row->imgNombreFisico )}}" style="width: 90%; max-width: 190px; height: 150px; border-radius: 4px;" >
                        </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection