@extends('layout')
@section('content')
    <div class="container-fluid" style="margin-top:9em">
        <a class="btn btn-primary mb-2" href="{{route('administrar')}}">
          Volver al panel de administración
        </a>

        <div class="card mb-5">
            <form action="{{route('content.update' ,$content->id)}}" method="post"
                  enctype="multipart/form-data">
                <div class="card-header">
                    Editar contenido
                </div>

                <div class="card-body">
                    {{csrf_field()}}
                    {{method_field('PUT')}}

                    <div class="form-group">
                        <label for="name">Categoría (*)</label>
                        <select class="form-control"
                                id="category_id" name="category_id">
                            @foreach($categories as $category)
                                @isset($content->category)
                                    <option value="{{$category->id}}" {{$category->id == $content->category->id ? 'selected' : null}}>{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endisset
                            @endforeach
                        </select>
                        <small class="text-info">Seleccione una categoría
                            para agrupar este contenido con otros contenidos similares.
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="name">Nombre (*)</label>
                        <input type="text" class="form-control"
                               id="name" name="name" required value="{{ $content->name }}">
                    </div>

                    @if ($errors->has('name'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="description">Descripción (*)</label>
                        <textarea class="form-control" required
                                  id="description" name="description">{{ $content->description }}</textarea>
                    </div>

                    @if ($errors->has('description'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('description') }}</strong>
                        </div>
                    @endif

                    @if($content->content_type_id == 1)
                    <div class="form-group">
                        <label for="name">Algoritmo</label>
                        <input type="text" class="form-control"
                               id="name" name="algorithm" value="{{ $content->algorithm }}">
                    </div>

                    @if ($errors->has('algorithm'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('algorithm') }}</strong>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="country">País de origen</label>
                        <input type="text" class="form-control"
                               id="country" name="country" value="{{ $content->country }}">
                    </div>

                    @if ($errors->has('country'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('country') }}</strong>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="year">Año de lanzamiento</label>
                        <input type="number" class="form-control"
                               id="year" name="year" max="{{date('Y')}}" value="{{ $content->year }}">
                    </div>

                    @if ($errors->has('year'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('year') }}</strong>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="maximum_value">Valor máximo histórico</label>
                        <input type="number" class="form-control"
                               id="maximum_value" name="maximum_value" value="{{ $content->maximum_value }}">
                    </div>

                    @if ($errors->has('maximum_value'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('maximum_value') }}</strong>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="unit">Unidad</label>
                        <input type="text" class="form-control"
                               id="unit" name="unit" value="{{ $content->unit }}">
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
                                   id="video_id" name="video_id" value="{{$content->video_id}}">
                        </div>

                        @if ($errors->has('video_id'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('video_id') }}</strong>
                            </div>
                        @endif

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
                        <input type="file" name="imageFile" id="imageFile" accept="image/*" {{$content->image ? '' : 'required'}} class="form-control-file">
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