@extends('administrador.dashboard')
@section('contentDashboard')

    <h4>Contenidos</h4>
    <div class="alert alert-warning">
        Los contenidos que se muestran en la app se mantienen
        sincronizados con los de esta lista.
        <br>
        <a href="{{route('content.create')}}" class="btn btn-warning btn-sm mt-1">
            <i class="fa fa-plus"></i>&nbsp;Agregar contenido</a>
    </div>
    <table class="table table-hover">
        <thead class="table-warning">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Imagen</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contents as $content)
            <tr>
                <td>{{$content->id}}</td>
                <td>{{$content->name}}</td>

                <td>
                    <img src="/storage/uploads/{{$content->image}}" alt="Imagen de contenido" class="img-thumbnail"
                         style="width:75px;">
                </td>
                <td>
                    <div class="btn-group btn-group-sm" role="group">
                        <a type="button" class="btn btn-warning"
                           href="{{route('content.edit', $content->id)}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a type="button" onclick="confirmarEliminacionContenido({{$content->id}})"
                           class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$contents->links()}}

@endsection