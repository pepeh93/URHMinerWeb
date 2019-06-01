@extends('layout')
@section('content')
    <header class="masthead bg-primary text-white text-center">
        <div class="container">
            <h3 class="text-uppercase mb-0">Pools</h3>
            <h4 style="font-weight:lighter;">Estado de pools</h4>
            <h6>Esta información se actualiza automáticamente cada 5 minutos.</h6>
        </div>
    </header>
    <section>
        <div class="container">
            <table class="table table-striped">
                <thead class="bg-warning">
                <tr>
                    <td>Nombre</td>
                    <td>Host</td>
                    <td>Estado</td>
                    <td>Última comprobación</td>
                </tr>
                </thead>
                <tbody>
                @foreach($pools as $pool)
                    <tr>
                        <td>{{$pool->name}}</td>
                        <td>{{$pool->host}}</td>
                        <td>{{$pool->is_alive ? 'Activo' : 'Caído'}}</td>
                        <td>{{\Carbon\Carbon::parse($pool->last_checked_at)->diffForHumans()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
