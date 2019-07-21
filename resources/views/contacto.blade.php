@extends('layout')

@section('styles')
    <style>
        .error {
            color: red;
            margin-top: 0.5em;
        }
        #faltaCaptcha{
            font-weight:normal !important;
        }
    </style>
@endsection

@section('content')
    <header class="masthead bg-primary text-white text-center">
        <div class="container">
            <h3 class="text-uppercase mb-0">Formulario de contacto</h3>
            <h4 style="font-weight:lighter;">¿Dudas? Escribinos aquí y te responderemos a la brevedad.</h4>
        </div>
    </header>
    <section id="contact">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-success">
                    {{ session('error') }}
                </div>
            @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif

            <form action="{{route('guardarContacto')}}" id="formContacto" class="bg-light px-5 py-5" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresá tu nombre">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingresá tu email">
                </div>

                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" maxlength="500" rows="5"
                              placeholder="Contanos tu duda, será respondida lo antes posible."></textarea>
                </div>

                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                    <div class="row">

                        <div class="col-md-12">
                            {!! app('captcha')->display() !!}

                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                            @endif

                        </div>

                        <strong id="faltaCaptcha" style="display:none;" class="error ml-3">Por favor, marcá esta
                            casilla para
                            continuar.</strong>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>

    </section>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
            integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script>
        var formValid = false;

        $(function () {
            $.validator.addMethod("lettersOnly", function (value, element) {
                return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
            }, "Por favor, ingresá sólo letras.");

            $("#formContacto").validate({
                rules: {
                    nombre: {required: true, lettersOnly: true},
                    email: {required: true, email: true},
                    mensaje: "required",
                },
                messages: {
                    "nombre": {
                        required: "Por favor, ingresá tu nombre",
                    },
                    "email": {
                        required: "Por favor, ingresá tu e-mail",
                        email: "El e-mail ingresado no es válido"
                    },
                    "mensaje": {
                        required: "Por favor, ingresá tu consulta"
                    }
                },
                submitHandler: function (e) {
                    formValid = true;
                    submitForm();
                },
                invalidHandler: function (form, validator) {
                    formValid = false;
                    var response = grecaptcha.getResponse();
                    if (response.length == 0) {
                        $("#faltaCaptcha").fadeIn();
                        return false;
                    }
                },
            });
        });

        function submitForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                $("#faltaCaptcha").fadeIn();
                return false;
            }

            if (formValid) {
                $("#formContacto"[0]).submit();
                return true;
            }
        }
    </script>
@endsection
