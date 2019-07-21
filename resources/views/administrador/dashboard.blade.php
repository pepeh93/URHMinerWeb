@extends('layout')
@section('styles')
    <style>
        table {
            font-size: 12px;
        }
    </style>
@endsection
@section('content')
    <header class="masthead bg-primary text-white text-center">
        <div class="container">
            <h3 class="text-uppercase mb-0">Panel de administración</h3>
            <h4 style="font-weight:lighter;">Gestión de usuarios, categorías, contenidos y pools.</h4>
        </div>
    </header>
    <section>

        <div class="container">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'users' || Request::path() == 'administrar' ? 'text-white bg-warning' : ''}}"
                       href="{{route('user.index')}}">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'category' ? 'text-white bg-warning' : ''}}"
                       href="{{route('category.index')}}">Categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'content' ? 'text-white bg-warning' : ''}}"
                       href="{{route('content.index')}}">Contenidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'pool' ? 'text-white bg-warning' : ''}}"
                       href="{{route('pool.index')}}">Pools</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'formularios-de-contacto' ? 'text-white bg-warning' : ''}}"
                       href="{{route('verFormulariosContacto')}}">Formularios de contacto</a>
                </li>
            </ul>
        </div>


        <hr>

        <div class="container mt-1">

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            @yield('contentDashboard')

            <div class="modal fade" id="modalEliminarPool" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar pool</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-body">
                            ¿Confirmar eliminación del pool seleccionado?
                        </div>
                        <div class="modal-footer">
                            <form method="POST" id="formDeletePool">
                                <input type="hidden" name="_method" value="DELETE">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-danger">Sí</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalEliminarContenido" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar contenido</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-body">
                            ¿Confirmar eliminación del contenido seleccionado?
                        </div>
                        <div class="modal-footer">
                            <form method="POST" id="formDeleteContent">
                                <input type="hidden" name="_method" value="DELETE">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-danger">Sí</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalEliminarCategoria" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar categoría</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-body">
                            ¿Confirmar eliminación de la categoría seleccionada?
                        </div>
                        <div class="modal-footer">
                            <form method="POST" id="formDeleteCategory">
                                <input type="hidden" name="_method" value="DELETE">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-danger">Sí</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalEliminarContacto" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar contacto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-body">
                            ¿Confirmar eliminación del contacto seleccionado?
                        </div>
                        <div class="modal-footer">
                            <form method="POST" id="formDeleteContacto">
                                <input type="hidden" name="_method" value="DELETE">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-danger">Sí</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function confirmarEliminacionPool(id) {
            $("#formDeletePool").attr('action', 'pool/' + id);
            $("#modalEliminarPool").modal("show");
        }

        function confirmarEliminacionContenido(id) {
            $("#formDeleteContent").attr('action', 'content/' + id);
            $("#modalEliminarContenido").modal("show");
        }

        function confirmarEliminacionCategoria(id) {
            $("#formDeleteCategory").attr('action', 'category/' + id);
            $("#modalEliminarCategoria").modal("show");
        }

        function confirmarEliminacionContacto(id) {
            $("#formDeleteContacto").attr('action', 'eliminar-contacto/' + id);
            $("#modalEliminarContacto").modal("show");
        }
    </script>
@endsection

