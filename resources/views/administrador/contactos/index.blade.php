@extends('administrador.dashboard')
@section('contentDashboard')
    <h4>Contactos</h4>
    <div class="alert alert-warning">
        Estos son los mensajes recibidos a través del formulario de contacto.
    </div>

    <table class="table table-hover">
        <thead class="table-warning">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Mensaje</th>
            <th scope="col">Fecha</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contactos as $contacto)
            <tr>
                <td>{{$contacto->nombre}}</td>
                <td>{{$contacto->email}}</td>
                <td>{{$contacto->mensaje}}</td>
                <td>{{$contacto->created_at}}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group">
                        <a type="button" onclick="confirmarEliminacionContacto({{$contacto->id}})"
                           class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$contactos->links()}}
@endsection