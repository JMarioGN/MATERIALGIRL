@extends('layouts.internal')
@section('content')


<a href="{{route('proveedores.index')}}">Inicio</a> <br><br>
<div class="d-flex justify-content-center">
    <table class="table table-striped" class="table table-hover" style="width: 60%; border-radius: 6px;">
        <thead style="background: #BB8FCE; color: #fff;">
            <tr style="text-align: center; font:100 19px arial; border-radius: 6px 0 0 0;">
                <th style="text-align: center; font:100 19px arial; border-radius: 6px 0 0 0;">Información de los proveedores</th>
                <th style="text-align: center; font:100 19px arial; border-radius: 0 6px 0 0;">
                    {{ Form::open(array('url' => route('proveedores.destroy', $modelo->id), 'class' => 'pull-right')) }}
                        <a class="btn btn-primary" href="{{route('proveedores.edit', $modelo->id)}}">Editar</a>
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Borrar', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td style="background: #A3E4D7;">
                        <div class="d-flex align-items-center" style=" height: 20px;">
                            <div> Nombre del proveedor</div>
                        </div> 
                    </td> 
                    <td style="background: #A3E4D7;">
                        <div class="d-flex align-items-center" style=" height: 20px;">
                            <div> {{$modelo->nombre}}</div>
                        </div> 
                    </td> 
                </tr>
                <tr>
                    <td style="background: #A3E4D7;">
                        <div class="d-flex align-items-center" style=" height: 20px;">
                            <div> Dirección</div>
                        </div> 
                    </td> 
                    <td style="background: #A3E4D7;">
                        <div class="d-flex align-items-center" style=" height: 20px;">
                            <div> {{$modelo->direccion}}</div>
                        </div> 
                    </td> 
                </tr>
                <tr>
                    <td style="background: #A3E4D7;">
                        <div class="d-flex align-items-center" style=" height: 20px;">
                            <div> Teléfono</div>
                        </div> 
                    </td> 
                    <td style="background: #A3E4D7;">
                        <div class="d-flex align-items-center" style=" height: 20px;">
                            <div> {{$modelo->telefono}}</div>
                        </div> 
                    </td> 
                </tr>
                <tr>
                    <td style="background: #A3E4D7;">
                        <div class="d-flex align-items-center" style=" height: 20px;">
                            <div> Fecha de registro</div>
                        </div> 
                    </td> 
                    <td style="background: #A3E4D7;">
                        <div class="d-flex align-items-center" style=" height: 20px;">
                            <div> {{$modelo->created_at}}</div>
                        </div> 
                    </td> 
                </tr>
                <tr>
                    <td style="background: #A3E4D7;">
                        <div class="d-flex align-items-center" style=" height: 20px;">
                            <div> Fecha de modificación</div>
                        </div> 
                    </td> 
                    <td style="background: #A3E4D7;">
                        <div class="d-flex align-items-center" style=" height: 20px;">
                            <div> {{$modelo->updated_at}}</div>
                        </div> 
                    </td> 
                </tr>
        </tbody>

    </table>
</div>

@endsection