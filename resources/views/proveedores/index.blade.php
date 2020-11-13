@extends('layouts.internal')
@section('content')

<a href="{{route('proveedores.create')}}">Registrar proveedor</a> <br> <br>
@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif
<div class="d-flex justify-content-center">
    <table class="table table-hover" class="table table-hover" style="width: 50%; border-radius: 6px;">
        <thead style="background: #BB8FCE; color: #fff;">
            <tr style="text-align: center; font:100 19px arial; border-radius: 6px 0 0 0;">
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($table as $row)
                <tr>
                    <td style="background: #A3E4D7;">
                        <div  class="d-flex align-items-center" style=" height: 40px;">
                            <div>
                                <a href="{{route('proveedores.show', $row->id)}}" style="color: #333; font:500 17px arial;">{{$row->nombre}}</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection