@extends('layout')
@section('content')
    <div class="container-fluid" style="margin-top:9em">
        <a class="btn btn-primary mb-2" href="{{route('administrar')}}">
          Volver al panel de administración
        </a>

        <div class="card mb-5">
            <form action="{{route('content.store')}}" method="post"
                  enctype="multipart/form-data">
                <div class="card-header">
                    Ingrese los datos del nuevo contenido
                </div>

                <div class="card-body">
                    {{csrf_field()}}
                    <div class="alert alert-info">
                        Si crea un contenido sólo con nombre y descripción, el contenido se visualizará
                        en la aplicación Android mostrando esa información.
                        Esto es útil para contenidos informativos o tutoriales.
                    </div>

<div class="form-group">
    <p>Tipo de contenido (*)</p>
                    <label class="radio-inline mr-3"><input type="radio" name="content_type_id" value="1" checked>
                        Ficha de criptomoneda
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="content_type_id" value="2">Informativo
                    </label>
</div>

                    <div class="form-group">
                        <label for="name">Categoría (*)</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <small class="text-info">Seleccione una categoría
                            para agrupar este contenido con otros contenidos similares.
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="name">Nombre (*)</label>
                        <input type="text" class="form-control"
                               id="name" name="name" required>
                    </div>

                    @if ($errors->has('name'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="description">Descripción (*)</label>
                        <textarea class="form-control" required
                                  id="description" name="description"></textarea>
                    </div>

                    @if ($errors->has('description'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('description') }}</strong>
                        </div>
                    @endif

                    <div class="form-group algorithm">
                        <label for="name">Algoritmo</label>
                        <input type="text" class="form-control"
                               id="algorithm" name="algorithm">
                    </div>

                    @if ($errors->has('algorithm'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('algorithm') }}</strong>
                        </div>
                    @endif

                    <div class="form-group country">
                        <label for="country">País de origen</label>
                        <input type="text" class="form-control"
                               id="country" name="country">
                    </div>

                    @if ($errors->has('country'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('country') }}</strong>
                        </div>
                    @endif

                    <div class="form-group year">
                        <label for="year">Año de lanzamiento</label>
                        <input type="number" class="form-control"
                               id="year" name="year" max="{{date('Y')}}">
                    </div>

                    @if ($errors->has('year'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('year') }}</strong>
                        </div>
                    @endif

                    <div class="form-group maximum_value">
                        <label for="maximum_value">Valor máximo histórico</label>
                        <input type="number" class="form-control"
                               id="maximum_value" name="maximum_value">
                    </div>

                    @if ($errors->has('maximum_value'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('maximum_value') }}</strong>
                        </div>
                    @endif

                    <div class="form-group unit">
                        <label for="unit">Unidad</label>
                        <input type="text" class="form-control"
                               id="unit" name="unit">
                    </div>

                    @if ($errors->has('unit'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('unit') }}</strong>
                        </div>
                    @endif

                    <div class="form-group video">
                        <label for="video_id">Video</label>
                        <small>ID del video de Youtube a mostrar en este contenido.</small>
                        <input type="text" class="form-control"
                               id="video_id" name="video_id">
                    </div>

                    @if ($errors->has('video_id'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('video_id') }}</strong>
                        </div>
                    @endif

                    <hr>

                    <div class="form-group">
                        <label for="extra_button_name">Texto del botón extra (opcional)</label>
                        <small>Complete este campo si desea que en la parte inferior del contenido
                        en la aplicación Android, se muestre un botón adicional, que dirigirá al usuario
                        a una URL a especificar.</small>
                        <input type="text" class="form-control"
                                  id="extra_button_name" name="extra_button_name"></input>
                    </div>

                    @if ($errors->has('extra_button_name'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('extra_button_name') }}</strong>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="extra_button_link">URL al hacer clic sobre el botón extra (opcional)</label>
                        <small>Complete este campo únicamente si completó el campo anterior (Texto del botón extra).
                        Especifique la URL a la cual se dirigirá al usuario al hacer clic sobre el botón extra.</small>
                        <input type="text" class="form-control"
                               id="extra_button_link" name="extra_button_link"></input>
                    </div>

                    @if ($errors->has('extra_button_link'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('extra_button_link') }}</strong>
                        </div>
                    @endif

                    <hr>
                    <div class="form-group">
                        <label for="imageFile"> <i class="fa fa-photo"></i>&nbsp;Archivo de imagen</label>
                        <input type="file" name="imageFile" id="imageFile" required accept="image/*" class="form-control-file">
                        <small class="form-text text-muted">
                            Seleccione un archivo de imagen para el contenido
                        </small>
                    </div>
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

@section('scripts')
    <script>
        $(function(){
            $('input:radio[name=content_type_id]').change(function () {

                switch ($('input:radio[name=content_type_id]:checked').val()) {
                    case '1':
                        $(".algorithm").show();
                        $(".country").show();
                        $(".year").show();
                        $(".maximum_value").show();
                        $(".unit").show();
                        $(".video").show();
                        break;
                    case '2':
                        $(".algorithm").hide();
                        $(".country").hide();
                        $(".year").hide();
                        $(".maximum_value").hide();
                        $(".unit").hide();
                        $(".video").hide();
                        break;
                }
            });
        })
    </script>
    @endsection