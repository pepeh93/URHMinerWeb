@extends('layout')

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
            <form action="contacto" class="bg-light px-5 py-5" method="post" onsubmit="return submitForm();">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre"
                           required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu email"
                           required>
                </div>

                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea type="email" class="form-control" id="mensaje" name="mensaje" maxlength="500" rows="5"
                              placeholder="Contanos tu duda, será respondida lo antes posible." required></textarea>
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

                        <strong id="faltaCaptcha" style="display:none;" class="text-danger ml-3">Por favor, marque esta casilla para
                            continuar.</strong>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>

    </section>
@endsection

@section('scripts')
    <script>
        function submitForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                $("#faltaCaptcha").fadeIn();
                return false;
            }
            return true;
        }
    </script>
@endsection
