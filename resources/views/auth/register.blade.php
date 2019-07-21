@extends('layout')
@section('styles')
    <style>
        .help-block {
            color: red;
        }

        .error {
            color: red;
            margin-top: 0.5em;
        }
    </style>
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-2">
                    <div class="card panel-default mt-4">
                        <div class="card-header">
                            Completá estos datos para ser parte de URHMiner.
                        </div>
                        <div class="card-body">
                            <form id="formRegistro" class="form-horizontal" method="POST"
                                  action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Nombre</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name"
                                               value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Dirección de correo
                                        electrónico</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password"
                                               required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirmar
                                        contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Registrarse
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
            integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script>
        $(function () {
            $.validator.addMethod("lettersOnly", function (value, element) {
                return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
            }, "Por favor, ingresá sólo letras.");

            $.validator.addMethod("passwordValid", function (value, element) {
                return this.optional(element) || /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/i.test(value);
            }, "La contraseña debe tener una longitud mínima de 8 caracteres, tiene que combinar mayúsculas y minúsculas, tener al menos un número y un caracter especial.");

            $("#formRegistro").validate({
                rules: {
                    name: {required: true, lettersOnly: true},
                    email: {required: true, email: true},
                    password: {
                        required:true,
                        passwordValid: true
                    },
                    password_confirmation: {
                        equalTo: "#password"
                    }
                },
                messages: {
                    "name": {
                        required: "Por favor, ingresá tu nombre",
                    },
                    "email": {
                        required: "Por favor, ingresá tu e-mail",
                        email: "El e-mail ingresado no es válido"
                    },
                    "password": {
                        required: "Por favor, ingresá una contraseña"
                    },
                    "password_confirmation": {
                        required: "Ingresá la contraseña nuevamente",
                        equalTo: "Las contraseñas ingresadas no coinciden"
                    },
                },
                submitHandler: function (e) {
                    $("#formRegistro"[0]).submit();
                }
            });
        });

    </script>
@endsection

