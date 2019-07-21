@extends('layout')
@section('content')
    <section class="page-section bg-primary text-white mb-0 mt-5" id="about">
        <div class="container">

            <!-- About Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-white">¿Qué es?</h2>

            <br>

            <!-- About Section Content -->
            <div class="row">
                <div class="col-lg-4 col-sm-12 text-center">
                    <img class="img-fluid" src="images/logo.png" alt="" style="width:50%">
                </div>
                <div class="col-lg-4 col-sm-12 ml-auto">
                    <p class="lead">URHMiner es una aplicación la cual permite la minería para usuarios no familiarizados con la misma a través de
                        aplicaciones de terceros funcionando como launcher.
                        También cuenta con una aplicación mobile para la monitorización de la misma.</p>
                </div>
                <div class="col-lg-4 col-sm-12 mr-auto">
                    <p class="lead">URH Miner es completamente gratuito y soporta las siguientes monedas:
                        <ul>
                        <li>Expanse</li>
                        <li>Ethereum Classic</li>
                        <li>Monero</li>
                        <li>Zcash</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img class="img-fluid" src="images/logo.png" alt="">
                    <div class="intro-text">
                        <h1 class="name" style="color:#2c3e50">URH Miner</h1>
                        <img class="img-fluid" src="images/separator.png" alt="">
                        <p style="color:#2c3e50" class="skills">Best hashrate ever!</p>
                        <br><br>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" style="font-size:20px">
                            Iniciar sesión
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-12 control-label">
                                        <i class="fa fa-user"></i> Dirección de correo
                                        electrónico</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}" required >

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-12 control-label">
                                        <i class="fa fa-lock"></i> Contraseña</label>

                                    <div class="col-md-12">
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
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Ingresar
                                        </button>

                                        <a class="btn btn-info btn-sm" href="{{ route('password.request') }}">
                                            ¿Olvidaste tu contraseña?
                                        </a>
                                        <hr>
                                        <p>¿No tenés cuenta? <a href="{{route('register')}}">Registrate ahora en URHMiner.</a></p>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <hr>


        </div>
    </section>


@endsection
