@extends('layout')
@section('content')
    <div class="container-fluid" style="margin-top:9em">
        <a class="btn btn-primary mb-2" href="{{route('administrar')}}">
          Volver al panel de administración
        </a>

        <div class="card mb-5">
            <form action="{{route('pool.update' ,$pool->id)}}" method="post"
                  enctype="multipart/form-data">
                <div class="card-header">
                    Editar pool
                </div>

                <div class="card-body">
                    {{csrf_field()}}
                    {{method_field('PUT')}}

                    <div class="form-group">
                        <label for="name">Nombre (*)</label>
                        <small>El nombre será visible para los usuarios al consultar el estado del pool.</small>
                        <input type="text" class="form-control"
                               id="name" name="name" required value="{{$pool->name}}">
                    </div>

                    @if ($errors->has('name'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="host">Host (*)</label>
                        <small>El host debe ser una dirección IP o un sitio web sin protocolo (sin HTTP/HTTPS).</small>
                        <input type="text" class="form-control"
                               id="host" name="host" required value="{{$pool->host}}">
                    </div>

                    @if ($errors->has('description'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('description') }}</strong>
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