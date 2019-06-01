@extends('layout')
@section('content')
    <div class="container-fluid" style="margin-top:9em">
        <a class="btn btn-primary mb-2" href="{{route('administrar')}}">
          Volver al panel de administración
        </a>

        <div class="card mb-5">
            <form action="{{route('category.update' ,$category->id)}}" method="post"
                  enctype="multipart/form-data">
                <div class="card-header">
                    Editar categoría
                </div>

                <div class="card-body">
                    {{csrf_field()}}
                    {{method_field('PUT')}}

                    <div class="form-group">
                        <label for="name">Nombre (*)</label>
                        <input type="text" class="form-control"
                               id="name" name="name" required value="{{ $category->name }}">
                    </div>

                    @if ($errors->has('name'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-6 offset-6 text-right">
                            <button type="submit" class="btn btn-primary ">
                                <i class="fa fa-save mr-1"></i> Guardar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection