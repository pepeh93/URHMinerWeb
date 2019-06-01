@extends('administrador.dashboard')
@section('contentDashboard')
    <h4>Usuarios</h4>
    <div class="alert alert-warning">
        Estos son los usuarios registrados en el sistema.
    </div>

    <table class="table table-hover">
        <thead class="table-warning">
        <tr>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
            <th scope="col">Fecha de registro</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$users->links()}}
@endsection