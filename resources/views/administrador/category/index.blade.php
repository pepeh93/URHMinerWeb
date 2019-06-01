@extends('administrador.dashboard')
@section('contentDashboard')


    <h4>Categorías</h4>
    <div class="alert alert-warning">
        Las categorías que se muestran en la aplicación Android se mantienen
        sincronizadas con las de esta lista.
        <br>
        <a href="{{route('category.create')}}" class="btn btn-warning btn-sm mt-1">
            <i class="fa fa-plus"></i>&nbsp;Agregar categoría</a>
    </div>
    <table class="table table-hover">
        <thead class="table-warning">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group">
                        <a type="button" class="btn btn-warning"
                           href="{{route('category.edit', $category->id)}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        @if(\Illuminate\Support\Facades\DB::table('contents')->where('category_id', $category->id)->doesntExist())
                            <a type="button" class="btn btn-danger" onclick="confirmarEliminacionCategoria({{$category->id}})">
                                <i class="fa fa-trash"></i>
                            </a>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mx-auto">
        {{$categories->links()}}
    </div>
    @endsection