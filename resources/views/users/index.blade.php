@extends('layouts.internal')
@section('content')

<a href="{{route('users.create')}}">Registrar usuario</a> <br> <br>
@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tableUsers as $rowUser)
            <tr>
                <td>
                    <a href="{{route('users.show', $rowUser->id)}}">{{$rowUser->name}}</a>
                </td>
                <td>{{$rowUser->email}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
