@extends('administrador.dashboard')
@section('contentDashboard')


    <h4>Pools</h4>
    <div class="alert alert-warning">
        Estos son los pools registrados en el sistema.
        <br>
        <a href="{{route('pool.create')}}" class="btn btn-warning btn-sm mt-1">
            <i class="fa fa-plus"></i>&nbsp;Agregar pool</a>
    </div>

    @if(sizeof($pools) > 0)
        <table class="table table-hover">
            <thead class="table-warning">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Host</th>
                <th scope="col">Estado</th>
                <th scope="col">Última comprobación</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pools as $pool)
                <tr>
                    <td>{{$pool->name}}</td>
                    <td>{{$pool->host}}</td>
                    @if($pool->last_checked_at)
                        <td>{{$pool->is_alive ? "Activo": "Caído"}}</td>
                        <td>{{\Carbon\Carbon::parse($pool->last_checked_at)->diffForHumans()}}</td>
                    @else
                        <td>Aún no se ha comprobado</td>
                        <td>Aún no se ha comprobado</td>
                    @endif

                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <a type="button" class="btn btn-warning"
                               href="{{route('pool.edit', $pool->id)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a type="button" onclick="confirmarEliminacionPool({{$pool->id}})"
                               class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No hay pools registrados por el momento.
            <a
                    href="{{route('pool.create')}}">
                Nuevo pool
            </a>
        </p>
    @endif

    {{$pools->links()}}

@endsection